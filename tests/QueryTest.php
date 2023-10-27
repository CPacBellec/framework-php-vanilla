<?php
use PHPUnit\Framework\TestCase;
use wolfpac\Controller\Database;
class QueryTest extends TestCase {
    public function testMethod(){
        $db = new Database();
        // Supposons que la méthode get() renvoie un objet avec la méthode définie
        $this->assertEquals("get", $db->get([])->getMethod());
        // Supposons que la méthode post() renvoie un objet avec la méthode définie
        $this->assertEquals("post", $db->post([])->getMethod());
        // Supposons que la méthode update() renvoie un objet avec la méthode définie
        $this->assertEquals("update", $db->update([])->getMethod());
        // Supposons que la méthode delete() renvoie un objet avec la méthode définie
        $this->assertEquals("delete", $db->delete([],true)->getMethod());
        // Supposons que la méthode soft-delete() renvoie un objet avec la méthode définie
        $this->assertEquals("soft-delete", $db->delete([],false)->getMethod());
        //5 assertions, 1 par méthode
    }
    public function testFormat(){
        $db = new Database();
        //5 assertions qui testent le format
        $this->assertEquals("SELECT %s FROM %s WHERE %s ;", $db->get([])->getFormat());

        // Test pour la méthode 'post'
        $this->assertEquals("INSERT INTO %s %s VALUES %s ;", $db->post([])->getFormat());

        // Test pour la méthode 'update'
        $this->assertEquals("UPDATE %s SET %s WHERE %s ;", $db->update([])->getFormat());

        // Test pour la méthode 'delete'
        $this->assertEquals("DELETE FROM %s WHERE %s;", $db->delete([], false)->getFormat());

        // Test pour la méthode 'soft-delete'
        $this->assertEquals("UPDATE %s SET %s WHERE %s ;", $db->delete([], true)->getFormat());
    }
}