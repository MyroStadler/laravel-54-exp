<?php
namespace App\Http\Controllers;


class PageController extends Controller {
    public function about() {
        return 'About us page';
    }
    public function contact() {
        return 'Contact page';
    }
    public function submitContact() {
        return 'Submit contact page';
    }
}