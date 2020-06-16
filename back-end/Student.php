<?
class Student extends JsonPost {
  /* Dispatches the API calls for the /student API
   * --------------------------------------------- */

  function list() {
    /* fetches all entries in table student for listing.
     * ---------------------------------------------- */
     Debug::echo("GET /api/student/list");
 
     $listAll = new ListAll();
     $listAll->main();  
   }

   function create() {
   /* creates a new student entries.
    * ---------------------------------------------- */
    Debug::echo("POST /api/student/create");

    $create = new Create($this->postAsObj());
    $create->main();  
  }

  function edit() {
    /* edits a student entry.
     * ---------------------------------------------- */
     Debug::echo("POST /api/student/edit");
 
     $edit = new Edit($this->postAsObj());
     $edit->main();  
  }  

  function delete() {
    /* deletes a student entry.
     * ---------------------------------------------- */
     Debug::echo("POST /api/student/delete");
 
     $delete = new Delete($this->postAsObj());
     $delete->main();  
  }    
}
?>