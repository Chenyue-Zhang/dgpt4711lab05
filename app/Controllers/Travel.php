<?php
namespace App\Controllers;

class Travel extends BaseController
{
    public function index()
    {
        // connect to the model
    //$places = new \App\Models\Places();
        // retrieve all the records
    //$records = $places->findAll();
    
        // get a template parser
    //$parser = \Config\Services::parser();
        // tell it about the substitions
    //return $parser->setData(['records' => $records])
        // and have it render the template with those
    //->render('placeslist');
        $model = new \App\Models\Places();
        $headings = $model->fields;
        $data = $model->findAll();

        $table = new \CodeIgniter\View\Table();
        // drop the last heading column
        unset($headings[count($headings)-1]);
        $table->setHeading($headings);

        foreach($data as $record) {
        //  unset($record[count($record)-1]);
        //  $table-addRow($record);    
            //$table->addRow($record->id, $record->name, $record->description,$record->link);
            $linkedThing = anchor("travel/showme/$record->id","$record->id");
            $table->addRow($linkedThing, $record->name, $record->description,$record->link);
            
        }

        $content = $table->generate();
        
        $view = \Config\Services::renderer();
        $output = $view->render('top') .$content .$view->render('bottom');
        return $output;
    }
    public function showme($id)
    {
        // connect to the model
      $places = new \App\Models\Places();
        // retrieve all the records
      $record = $places->find($id);
      // get a template parser
      $parser = \Config\Services::parser();
      // tell it about the substitions
      return $parser->setData($record)
      // and have it render the template with those
      ->render('oneplace');
      
//        helper('form');
//        $result = from_open('','id="open"');
//        $button= form_submit('Travel','submit');
//        
//        $places = new \App\Models\Places();
//        $record = $places->find($id);
//        $close = form_close('Travel', 'id="close"');
//        $parser = \Config\Services::pager();
//        return $parser->setData($record)->render('oneplace');
      
    }
}