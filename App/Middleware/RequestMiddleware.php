<?php
    namespace App;

    class RequestMiddleware {
        protected static $Request;

         /**
         * __construct
         *
         * Initializes the middleware
         *
         * @param void
         * @return void
         */
        public function __construct()
        {
          
          Self::$Request = isset($_SERVER['CONTENT_TYPE']) ? $_SERVER['CONTENT_TYPE'] : '';
          return;
        }

         /**
         * acceptsJson
         *
         * Determines if the request is of a JSON Content type
         *
         * @param void
         * @return boolean
         */
        public static function acceptsJson()
        {
          if (strtolower(Self::$Request) == 'application/json') {
            return true;
          }

          return false;
        }

         /**
         * acceptsFormData
         *
         * Determines if the request is of a Form Data Content type
         *
         * @param void
         * @return boolean
         */
        public static function acceptsFormData()
        {
          Self::$Request = explode(';', Self::$Request)[0];
          if (strtolower(Self::$Request) == 'multipart/form-data') {
            return true;
          }

          return false;
        }
    }
?>
