<?php

class session {

    public static function init() {
        session_start();
    }

    public static function destroy($clave = false) {
        if ($clave) {
            if (is_array($clave)) {
                for ($i = 0; $i < count($clave); $i++) {
                    if (isset($_SESSION[$clave[$i]])) {
                        unset($_SESSION[$clave[$i]]);
                    }
                }
            } else {
                if (isset($_SESSION[$clave])) {
                    unset($_SESSION[$clave]);
                }
            }
        } else {
            session_destroy();
        }
    }

    public static function set($clave, $valor) {
        if (!empty($clave))
            $_SESSION[$clave] = $valor;
    }

    public static function get($clave) {
        if (isset($_SESSION[$clave]))
            return $_SESSION[$clave];
    }

    public static function acceso($level) {
        if (!session::get('autenticado')) {
            header('location:' . BASE_URL . 'error/access/5050');
            exit;
        }

        if (session::get_level($level) > session::get_level(session::get('level'))) {
            header('location:' . BASE_URL . 'error/access/5050');
            exit;
        }
    }

    public static function acceso_vista($level) {
        if (!session::get('autenticado')) {
            return false;
        }

        if (session::get_level($level) > session::get_level(session::get('level'))) {
            return false;
        }

        return true;
    }

    public static function get_level($level) {
        $role['admin'] = 3;
        $role['especial'] = 2;
        $role['usuario'] = 1;

        if (!array_key_exists($level, $role)) {
            throw new Exception('Error de acceso');
        } else {
            return $role[$level];
        }
    }

    public static function acceso_estricto(array $level, $noAdmin = false) {
        if (!session::get('autenticado')) {
            header('location:' . BASE_URL . 'error/access/5050');
            exit;
        }

        if ($noAdmin == false) {
            if (session::get('level') == 'admin') {
                return;
            }
        }

        if (count($level)) {
            if (in_array(session::get('level'), $level)) {
                return;
            }
        }

        header('location:' . BASE_URL . 'error/access/5050');
    }

    public static function acceso_vista_estricto(array $level, $noAdmin = false) {
        if (!session::get('autenticado')) {
            return false;
        }

        if ($noAdmin == false) {
            if (session::get('level') == 'admin') {
                return true;
            }
        }

        if (count($level)) {
            if (in_array(session::get('level'), $level)) {
                return true;
            }
        }

        return false;
    }

}

?>