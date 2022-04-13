<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;


class ScrapeController extends Controller
{
    private $result = array();
    private $hrefs = array();

    public function scrape_picisco()
    {
        $client = new Client();
        $url = "https://www.picisoc.org/";
        $page = $client->request('GET', $url);

        $page->filter("article.post")->each(function ($item) {
            $this->result[$item->filter('a')->text()] = $item->filter('.post')->text();
        });
        $web_date_arry = array();
        foreach ($this->result as $key => $value) {
            $dated = str_replace($key, '', $value);
            $web_date_arry[$key] = [$dated];
        }
        $count = 0;

        $page->filter('.views-field a')->each(function ($node) {
            array_push($this->hrefs, $node->attr('href'));
        });


        foreach ($web_date_arry as $key => $value) {
            $link = $this->hrefs[$count];
            echo "<a class='insight_link' target='_blank' href='$link'><p>";
            echo " <span class='mdi mdi-newspaper text-white-50'></span> &nbsp";
            echo $key;
            echo "<br><span class='text-white card-subtitle'>";
            echo($value[0]);
            echo "</span>";
            echo "</p></a>";

            $count++;
        }
    }
    private $result_2 = array();
    private $date_2 = array();
    private $hrefs_2 = array();

    public function scrape_pingo()
    {

        $client = new Client();
        $url = "http://www.piango.org/our-news-events/latest-news/";
        $page = $client->request('GET', $url);

        //title
        $page->filter("article.elementor-post")->each(function ($item) {
            $this->result_2[$item->filter('a')->text()] = $item->filter('.post')->text();
        });


        //date
            $page->filter(".elementor-post__meta-data span")->each(function ($item) {
                array_push($this->date_2,$item->text()) ;
      });


        //href
        $page->filter('.elementor-post__title a')->each(function ($node) {
            array_push($this->hrefs_2, $node->attr('href'));
        });

        $count = 0;
        foreach ($this->result_2 as $key => $value) {
            $link = $this->hrefs_2[$count];
           echo "<a class='insight_link' target='_blank' href='$link'><p>";
           echo " <span class='mdi mdi-newspaper text-white-50'></span> &nbsp";
           echo $key;
           echo "<br><span class='text-white card-subtitle'>";
           echo($this->date_2[$count]);
           echo "</span>";
           echo "</p></a>";
            $count++;
        }

       die();
    }
}
