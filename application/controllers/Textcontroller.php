<?php
class Textcontroller extends CI_Controller
{
    
    public function __constructor()
     {
         parent::__construct();
         $this->load->helper(array('form', 'url'));
         $this->load->library('form_validation');

     }

     public function index()
     {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->view('addtext');
     }
     public function checktext()
     {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('array');
        $this->form_validation->set_rules('url', 'url', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('addtext');
        }
        else
        {
                $data = array();
                $error = array();
                $url = trim(htmlentities($this->input->post('url')));
                if (preg_match('/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i', $url))
                {
                $ext = pathinfo($url,PATHINFO_EXTENSION);
                // if(($ext == "asp")||($ext == "html")||($ext =="php")||($ext == "org")||($ext == "com"))
                // {
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
                $content = curl_exec($ch);
                curl_close($ch);
                echo htmlentities($content);
                if(preg_match('/(\.jpg|\.png|\.bmp)/',$content))
                {
                    echo "match found";
                }
                //$html = $content;
                // $doc = new DOMDocument();
                // @$doc->loadHTML($content);
                // $parse = parse_url($url);
                // $host = $parse["host"];
               
                // $tags = $doc->getElementsByTagName('img');
                // foreach ($tags as $tag)
                // {
                //    $result = $tag->getAttribute('src');
                //    $newurl = "$host/$result";
                //    echo "<img src = http://$newurl>";          
                //    echo $tag->getAttribute('alt')."<br>"; 
                // }
                // $nodes = $doc->getElementsByTagName('title');
                // $title = $nodes->item(0)->nodeValue;
                // $metas = $doc->getElementsByTagName('meta');
                // for ($i = 0; $i < $metas->length; $i++)
                // {
                //     $meta = $metas->item($i);
                //     if($meta->getAttribute('name') == 'description')
                //     {
                //     $description = $meta->getAttribute('content');
                //     echo "Description: $description". '<br/><br/>';
                //     }
                    
                //     if($meta->getAttribute('name') == 'keywords')
                //     {
                //     $keywords = $meta->getAttribute('content');
                //     echo "Keywords: $keywords";
                //     }
               // }
               // echo "Title: $title". '<br/><br/>';
                
                
                //}// ends matching php html
                // else
                // {
                //     echo "invalid URL";
                // }
                }
                //if preg_match ends
        } //else ends
    }//function ends
}//class ends
?>