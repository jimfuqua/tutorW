<?php
namespace jimfuqua\tutorW;

/*
    * LessonsClass.php File Doc Comment
    *
    * LessonsClass represents an assigned lesson.
    *
    * PHP version 5+
    *
    * @package    MyElectronicTeacher
    * @subpackage Tutor
    * @author     Jim Fuqua <jim@jim-fuqua.com>
    * @copyright  2015 Jim Fuqua
    * @category   Identifies a specific assigned lesson.
    * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License V3+
    * @link       http://www.jim-fuqua.com/
*/

/**
 * Assignment.class.php
 *
 * A lesson must have or immediately obtain a generic assignment from
 *    tGenericAssignments. A lesson must have a student from the start.
 * The purpose of a "Lesson" which is a member of this class is to
 *    encapsulate a tGenericAssignments row and a tAssignments Row
 *    at the earliest possible time and then represent the current
 *    assignment for a particular student with all of the relevant database
 *    and methods for manipulating such data and the student responses.
 **/
class LessonsClass
{
  public function __construct()
  {
      echo "I am a LessonsClass instance.<br/>";
  }
}
