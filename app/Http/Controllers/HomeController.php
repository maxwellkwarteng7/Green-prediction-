<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Soccer;
use App\Models\Scorer;
use App\Models\Basketball;
use App\Models\Tennis;
use App\Models\Subscribers;
use App\Models\Contact;


use App\Models\activeSubscribers;



class HomeController extends Controller
{
    public function index (){
      if(Auth::id()){
       return redirect ('/redirect');
    }else{
        $straight_wins = Soccer::where('category','=',"Straight win")->orderBy('time','asc')->get();

        $straight_count = Soccer::where('category','=',"Straight win")->count();

        $both_teams = Soccer::where('category','=',"Both team to score")->orderBy('time','asc')->get();

        $both_count = Soccer::where('category','=',"Both team to score")->count();

        $overs = Soccer::where('category','=',"Overs/Unders")->orderBy('time','asc')->get();

        $overs_count = Soccer::where('category','=',"Overs/Unders")->count();

        $corners = Soccer::where('category','=',"Corners")->orderBy('time','asc')->get();

        $corners_count = Soccer::where('category','=',"Corners")->count();

        $scorers = Scorer::where('category','=',"Scorer")->orderBy('time','asc')->get();

        $scorers_count = Scorer::where('category','=',"Scorer")->count();

        $predictions = Soccer::where('category','=',"Weekend prediction")->orderBy('time','asc')->get();

        $predictions_count = Soccer::where('category','=',"Weekend prediction")->count();

        $basket_straight_count = Basketball::where('category','=',"Straight win")->count();

        $basket_overs_count = Basketball::where('category','=',"Overs/Unders")->count();

        $tennis_straight_count =Tennis::where('id','>=',1)->count();

        $subscribers = activeSubscribers::where('id','=','1')->value('number');


        $total_games = $straight_count +$scorers_count+$predictions_count+$both_count + $corners_count + $basket_straight_count + $basket_overs_count +$tennis_straight_count ;



      return view ('welcome',compact('straight_wins','both_teams','overs','corners','scorers','predictions','straight_count','both_count','overs_count','corners_count','scorers_count','predictions_count','total_games','subscribers'));
    }
    }

    public function redirect (){
      if(Auth::id()){
      $usertype = Auth::user()->usertype ;
      if($usertype==1){

        $subscribers_count = Subscribers::where('id','>=',1)->count();

        $contacts_count =Contact::where('id','>=',1)->count();

        $football = Soccer::where('id','>=',1)->count();

        $scorers = Scorer::where('id','>=',1)->count();

        $basketball = Basketball::where('id','>=',1)->count();

        $tennis = Tennis::where('id','>=',1)->count();

        $subscribers = Subscribers::where('id','>=',1)->latest()->get();


        $contacts=Contact::where('id','>=',1)->latest()->get();


        return view ('admin.home',compact('subscribers_count','contacts_count','football','scorers','basketball','tennis','subscribers','contacts'));
      }else{
        $straight_wins = Soccer::where('category','=',"Straight win")->orderBy('time','asc')->get();

        $straight_count = Soccer::where('category','=',"Straight win")->count();

        $both_teams = Soccer::where('category','=',"Both team to score")->orderBy('time','asc')->get();

        $both_count = Soccer::where('category','=',"Both team to score")->count();

        $overs = Soccer::where('category','=',"Overs/Unders")->orderBy('time','asc')->get();

        $overs_count = Soccer::where('category','=',"Overs/Unders")->count();

        $corners = Soccer::where('category','=',"Corners")->orderBy('time','asc')->get();

        $corners_count = Soccer::where('category','=',"Corners")->count();

        $scorers = Scorer::where('category','=',"Scorer")->orderBy('time','asc')->get();

        $scorers_count = Scorer::where('category','=',"Scorer")->count();

        $predictions = Soccer::where('category','=',"Weekend prediction")->orderBy('time','asc')->get();

        $predictions_count = Soccer::where('category','=',"Weekend prediction")->count();

        $basket_straight_count = Basketball::where('category','=',"Straight win")->count();

        $basket_overs_count = Basketball::where('category','=',"Overs/Unders")->count();

        $tennis_straight_count =Tennis::where('id','>=',1)->count();

        $subscribers = activeSubscribers::where('id','=','1')->value('number');


        $total_games = $straight_count +$scorers_count+$predictions_count+$both_count + $corners_count + $basket_straight_count + $basket_overs_count +$tennis_straight_count ;



      return view ('welcome',compact('straight_wins','both_teams','overs','corners','scorers','predictions','straight_count','both_count','overs_count','corners_count','scorers_count','predictions_count','total_games','subscribers'));
      }
    }else{
      return redirect('/login');
    }
  }

public function view_all_straight(){
  if(Auth::id()){
  $usertype = Auth::user()->usertype;
        if($usertype==0){

          $all_straight = Soccer::where('category','=',"Straight win")->orderBy('time','asc')->paginate(2);
          return view('Homepages.view_all_straight',compact('all_straight'));

        }else{
          return redirect('/redirect');
    }
  }else{
    $all_straight = Soccer::where('category','=',"Straight win")->orderBy('time','asc')->paginate(2);
    return view('Homepages.view_all_straight',compact('all_straight'));
  }
}

public function view_all_both(){
  if(Auth::id()){
  $usertype = Auth::user()->usertype;
        if($usertype==0){

          $all_both = Soccer::where('category','=',"Both team to score")->orderBy('time','asc')->paginate(15);
          return view('Homepages.view_all_both',compact('all_both'));

        }else{
          return redirect('/redirect');
    }
  }else{
    $all_both = Soccer::where('category','=',"Both team to score")->orderBy('time','asc')->paginate(15);
    return view('Homepages.view_all_both',compact('all_both'));
  }
}

public function view_all_overs(){
  if(Auth::id()){
  $usertype = Auth::user()->usertype;
        if($usertype==0){

          $all_overs = Soccer::where('category','=',"Overs/Unders")->orderBy('time','asc')->paginate(15);
          return view('Homepages.view_all_overs',compact('all_overs'));

        }else{
          return redirect('/redirect');
    }
  }else{
    $all_overs = Soccer::where('category','=',"Overs/Unders")->orderBy('time','asc')->paginate(15);
    return view('Homepages.view_all_overs',compact('all_overs'));
  }
}

public function view_all_corners(){
  if(Auth::id()){
  $usertype = Auth::user()->usertype;
        if($usertype==0){

          $all_corners= Soccer::where('category','=',"Corners")->orderBy('time','asc')->paginate(15);
          return view('Homepages.view_all_corners',compact('all_corners'));

        }else{
          return redirect('/redirect');
    }
  }else{
    $all_corners = Soccer::where('category','=',"Corners")->orderBy('time','asc')->paginate(15);
    return view('Homepages.view_all_corners',compact('all_corners'));
  }
}

public function view_all_scorers(){
  if(Auth::id()){
  $usertype = Auth::user()->usertype;
        if($usertype==0){

          $all_scorers= Scorer::where('category','=',"Scorer")->orderBy('time','asc')->paginate(15);
          return view('Homepages.view_all_scorers',compact('all_scorers'));

        }else{
          return redirect('/redirect');
    }
  }else{
    $all_scorers = Scorer::where('category','=',"Scorer")->orderBy('time','asc')->paginate(15);
    return view('Homepages.view_all_scorers',compact('all_scorers'));
  }
}


public function view_all_weekend(){
  if(Auth::id()){
  $usertype = Auth::user()->usertype;
        if($usertype==0){

          $all_weekend= Soccer::where('category','=',"Weekend prediction")->orderBy('time','asc')->paginate(15);
          return view('Homepages.view_all_weekend',compact('all_weekend'));

        }else{
          return redirect('/redirect');
    }
  }else{
    $all_weekend = Soccer::where('category','=',"Weekend prediction")->orderBy('time','asc')->paginate(15);
    return view('Homepages.view_all_weekend',compact('all_weekend'));
  }
}

public function nba_home (){
    if(Auth::id()){
      $usertype = Auth::user()->usertype;
      if($usertype==0){
        $basket_straight_wins = Basketball::where('category','=',"Straight win")->orderBy('time','asc')->get();

        $basket_overs = Basketball::where('category','=',"Overs/Unders")->orderBy('time','asc')->get();

        $basket_straight_count = Basketball::where('category','=',"Straight win")->count();

        $basket_overs_count = Basketball::where('category','=',"Overs/Unders")->count();

        return view('Homepages.nba_home',compact('basket_straight_wins','basket_overs','basket_straight_count','basket_overs_count'));
      }else{
        return redirect('redirect');
      }
    }else{
      $basket_straight_wins = Basketball::where('category','=',"Straight win")->orderBy('time','asc')->get();

      $basket_overs = Basketball::where('category','=',"Overs/Unders")->orderBy('time','asc')->get();

      $basket_straight_count = Basketball::where('category','=',"Straight win")->count();

      $basket_overs_count = Basketball::where('category','=',"Overs/Unders")->count();


      return view('Homepages.nba_home',compact('basket_straight_wins','basket_overs','basket_straight_count','basket_overs_count'));
    }
}

// viewing all basketball games per category from home
public function all_straight_basketball(){
  if(Auth::id()){
    $usertype = Auth::user()->usertype;
        if($usertype==0){

          $all_straight_basketball= Basketball::where('category','=',"Straight win")->orderBy('time','asc')->paginate(15);
          return view('Homepages.all_straight_basketball',compact('all_straight_basketball'));

        }else{
          return redirect('/redirect');
    }
  }else{
        $all_straight_basketball= Basketball::where('category','=',"Straight win")->orderBy('time','asc')->paginate(15);
        return view('Homepages.all_straight_basketball',compact('all_straight_basketball'));

  }
}

public function all_overs_basketball(){
  if(Auth::id()){
    $usertype = Auth::user()->usertype;
        if($usertype==0){

          $all_overs_basketball= Basketball::where('category','=',"Overs/Unders")->orderBy('time','asc')->paginate(15);
          return view('Homepages.all_overs_basketball',compact('all_overs_basketball'));

        }else{
          return redirect('/redirect');
    }
  }else{
    $all_overs_basketball= Basketball::where('category','=',"Overs/Unders")->orderBy('time','asc')->paginate(15);
    return view('Homepages.all_overs_basketball',compact('all_overs_basketball'));

  }
}

// The tennis home and its page
public function tennis_home(){
  if(Auth::id()){
  $usertype = Auth::user()->usertype;
        if($usertype==0){
          $tennis_straight = Tennis::where('id','>=',1)->orderBy('time','asc')->get();

          $tennis_straight_count =Tennis::where('id','>=',1)->count();
          return view('Homepages.tennis_home',compact('tennis_straight','tennis_straight_count'));


        }else{
          return redirect('/redirect');
    }
  }else{
    $tennis_straight = Tennis::where('id','>=',1)->orderBy('time','asc')->get();

      $tennis_straight_count= Tennis::where('id','>=',1)->count();
    return view('Homepages.tennis_home',compact('tennis_straight','tennis_straight_count'));

  }
}

public function all_straight_tennis(){
  if(Auth::id()){
    $usertype = Auth::user()->usertype;
        if($usertype==0){

          $all_straight_tennis= Tennis::where('category','=',"Straight win")->orderBy('time','asc')->paginate(15);
          return view('Homepages.all_straight_tennis',compact('all_straight_tennis'));

        }else{
          return redirect('/redirect');
    }
  }else{
          $all_straight_tennis= Tennis::where('category','=',"Straight win")->orderBy('time','asc')->paginate(15);
          return view('Homepages.all_straight_tennis',compact('all_straight_tennis'));

  }
}
// end of controller class 
}
