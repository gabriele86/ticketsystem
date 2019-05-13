<?php


namespace App\Enum;


use PhpParser\Node\Scalar\String_;

abstract class TicketStatusEnum
{
   const STATUS_OPENED = 1;
   const STATUS_ASSIGNED = 2;
   const STATUS_CLOSED = 3;

   protected static $statusName = [

       self::STATUS_OPENED => 'Creato',
       self::STATUS_ASSIGNED => 'Preso in carico',
       self::STATUS_CLOSED => 'Chiuso'

   ];

    /**
     * @param $statusCode
     * @return String
     */
   public static function getStatusName($statusCode) : String
   {
       if(!isset(static::$statusName[$statusCode])){
           return "Unknown ticket status ($statusCode)";
       }
       return static::$statusName[$statusCode];
   }

    /**
     * @return Array of available ticket status
     */
   public static function getAvailableStatus() : Array
   {
        return [
            self::STATUS_OPENED,
            self::STATUS_ASSIGNED,
            self::STATUS_CLOSED
        ];
   }
}