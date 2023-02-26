<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Soccer;
use App\Models\Scorer;
use App\Models\Contact;
use App\Models\Basketball ;
use App\Models\Tennis ;
use App\Models\activeSubscribers;



use App\Models\Subscribers;
use Notification;
use App\Notifications\subscriberNotification;
use App\Notifications\contactNotification;



use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
public function __construct()
{
$this->middleware('auth',['except'=>['add_subscriber','add_contact']]);
}

public function add_game(){
$usertype = Auth::user()->usertype;
if($usertype==1){

return view('/adminpages.add_game');

}else{
return redirect('/redirect');
}

}

public function save_game(request $request){

    $game = new Soccer ;
    $game->league = $request->league ;
    $game->game = $request->game ;
    $game->time = $request->time ;
    $game->odds = $request->odds ;
    $game->prediction = $request->prediction ;
    $game->category = $request->category ;
    $game->save();

Alert::success('','Game uploaded successfully');

return redirect()->back();

}

public function straight_win(){
$usertype = Auth::user()->usertype;
if($usertype==1){

$straight_wins = Soccer::where('category','=',"Straight win")->paginate(10);

return view('adminpages.straight_win',compact('straight_wins'));

}else{
return redirect('/redirect');
}
}

// searching straight wins
public function search_straight_wins(request $request){

$usertype = Auth::user()->usertype;
if($usertype==1){
$search = $request->search_wins ;
$straight_wins = Soccer::where('category','=',"Straight win")->where('Game','like','%'.$search.'%')->latest()->paginate(10);

return view('adminpages.straight_win',compact('straight_wins'));


}else{
return redirect('/redirect');
}
}
// End searching straight wins

// changing the check status for straight wins

public function match_won(request $request, $id){
$match = Soccer::find($id);
$match->check = 'won';
$match->save();

Alert::success('','Match Won');

return redirect()->back();
}

public function match_lost(request $request, $id){
$match = Soccer::find($id);
$match->check = 'lost';
$match->save();

Alert::warning('','match lost');

return redirect()->back();
}

// end changing check status

// deleting straight wins
public function delete_match($id){
$game = Soccer::find($id);
$game->delete();
Alert::success('','match deleted');
return redirect()->back();
}
// end delete of straight wins

public function both_teams(){
$usertype = Auth::user()->usertype;
if($usertype==1){

$both_teams = Soccer::where('category','=',"Both team to score")->paginate(10);

return view ('/adminpages.both_teams',compact('both_teams'));


}else{
return redirect('/redirect');
}
}

// searching both teams
public function search_both_teams(request $request){
$usertype = Auth::user()->usertype;
if($usertype==1){
$search = $request->search;
$both_teams= Soccer::where('category','=',"Both team to score")->where('Game','like','%'.$search.'%')->latest()->paginate(10);

return view('adminpages.both_teams',compact('both_teams'));


}else{
return redirect('/redirect');
}
}

public function overs(){
$usertype = Auth::user()->usertype;
if($usertype==1){

$overs = Soccer::where('category','=',"Overs/Unders")->paginate(10);

return view ('/adminpages.overs',compact('overs'));

}else{
return redirect('/redirect');
}
}

public function search_overs(request $request){
$usertype = Auth::user()->usertype;
if($usertype==1){
$search = $request->search;
$overs= Soccer::where('category','=',"Overs/Unders")->where('Game','like','%'.$search.'%')->latest()->paginate(10);

return view('adminpages.overs',compact('overs'));


}else{
return redirect('/redirect');
}
}



public function corners(){
  $usertype = Auth::user()->usertype;
  if($usertype==1){

    $corners = Soccer::where('category','=',"Corners")->paginate(10);

    return view ('/adminpages.corners',compact('corners'));

  }else{
    return redirect('/redirect');
}
}

public function search_corners(request $request){
  $usertype = Auth::user()->usertype;
  if($usertype==1){
    $search = $request->search;
    $corners= Soccer::where('category','=',"Corners")->where('Game','like','%'.$search.'%')->latest()->paginate(10);

    return view('adminpages.corners',compact('corners'));


  }else{
    return redirect('/redirect');
}
}

public function weekend_prediction(){
       $usertype = Auth::user()->usertype;
       if($usertype==1){

         $predictions = Soccer::where('category','=',"Weekend prediction")->paginate(10);

         return view ('/adminpages.weekend_prediction',compact('predictions'));

       }else{
         return redirect('/redirect');
   }
     }

     public function search_predictions(request $request){
       $usertype = Auth::user()->usertype;
       if($usertype==1){
         $search = $request->search;
         $predictions= Soccer::where('category','=',"Weekend prediction")->where('Game','like','%'.$search.'%')->latest()->paginate(10);

         return view('adminpages.weekend_prediction',compact('predictions'));


       }else{
         return redirect('/redirect');
   }
     }

     public function add_scorer(){
            $usertype = Auth::user()->usertype;
            if($usertype==1){

              return view ('adminpages.add_scorer');

            }else{
              return redirect('/redirect');
        }
          }

      public function save_scorer(request $request){
        $scorer = new Scorer ;
        $scorer->league = $request->league ;
        $scorer->game = $request->game ;
        $scorer->time = $request->time ;
        $scorer->scorer = $request->scorer ;
        $scorer->odds = $request->odds ;
        $scorer->save();

        Alert::success('','Scorer game uploaded');

        return redirect()->back();
      }

      public function scorers(){
             $usertype = Auth::user()->usertype;
             if($usertype==1){

               $scorers = Scorer::where('category','=',"Scorer")->paginate(10);

               return view ('/adminpages.scorers',compact('scorers'));

             }else{
               return redirect('/redirect');
         }
           }

           public function search_scorer(request $request){
             $usertype = Auth::user()->usertype;
             if($usertype==1){
               $search = $request->search;
               $scorers= Scorer::where('category','=','Scorer')->where('game','like','%'.$search.'%')
               ->Orwhere('scorer','like','%'.$search.'%')
               ->latest()->paginate(10);

               return view('adminpages.scorers',compact('scorers'));


             }else{
               return redirect('/redirect');
         }
           }

           public function scorer_won($id){
             $usertype = Auth::user()->usertype;
          if($usertype==1){
            $scorer = Scorer::find($id);
            $scorer->check = 'won';
            $scorer->save();
            Alert::success('','scorer match won');
            return redirect()->back();

          }else{
            return redirect('/redirect');
          }
           }

           public function scorer_lost($id){

             $usertype = Auth::user()->usertype;
             if($usertype==1){

               $scorer = Scorer::find($id);
               $scorer->check = 'lost';
               $scorer->save();
               Alert::warning('','scorer match lost');
               return redirect()->back();

             }else{
            return redirect('/redirect');
          }




           }

           public function all_games(){
             $usertype = Auth::user()->usertype;
             if($usertype==1){
               $all_games = Soccer::where('id','>=',1)->paginate(10);

               return view ('adminpages.all_games',compact('all_games'));
            }else{
            return redirect('/redirect');
          }
           }

           public function game_edit ($id){
             $usertype = Auth::user()->usertype;
             if($usertype==1){

               $game = Soccer::find($id);

               return view ('adminpages.game_edit',compact('game'));

             }else{
               return redirect('/redirect');
         }
           }

           public function search_game(request $request){
             $usertype = Auth::user()->usertype;
             if($usertype==1){
               $search = $request->search;
               $all_games= Soccer::where('game','like','%'.$search.'%')
               ->Orwhere('category','like','%'.$search.'%')
               ->Orwhere('check','like','%'.$search.'%')
               ->paginate(10);

               return view('adminpages.all_games',compact('all_games'));
             }else{
            return redirect('/redirect');
          }
           }

           public function update_game(request $request, $id){
             $usertype = Auth::user()->usertype;
             if($usertype==1){
               $game = Soccer::find($id);
               $game->league = $request->league;
               $game->game = $request->game;
               $game->time = $request->time;
               $game->prediction = $request->prediction;
               $game->odds = $request->odds;
               $game->category = $request->category;
               $game->check ='pending';
               $game->save();

               Alert::success('','Game updated successfully');

               return redirect()->back();





             }else{
            return redirect('/redirect');
          }

           }

           public function edit_scorer ($id){
             $usertype = Auth::user()->usertype;
             if($usertype==1){

               $scorer = Scorer::find($id);

               return view ('adminpages.edit_scorer',compact('scorer'));

             }else{
               return redirect('/redirect');
         }
           }

           public function update_scorer(request $request, $id){
             $usertype = Auth::user()->usertype;
             if($usertype==1){
               $scorer = Scorer::find($id);
               $scorer->league = $request->league;
               $scorer->game = $request->game;
               $scorer->time = $request->time;
               $scorer->scorer = $request->scorer;
               $scorer->Odds = $request->odds;
               $scorer->check ='pending';
               $scorer->save();

               Alert::success('','Scorer game updated successfully');

               return redirect()->back();
             }else{
            return redirect('/redirect');
          }

           }

           public function add_subscriber (request $request){
             if(Auth::id()){
             $usertype = Auth::user()->usertype;
             if($usertype==1){


               $subscriber = new Subscribers;
               $subscriber->name = $request->name ;
               $subscriber->email = $request->email ;
               $subscriber->save();

               Alert::success('Subscribed successfully','You will be receiving email updates from us ');

               return redirect()->back();



             }else{
               return redirect('/redirect');
         }
       }else {
           $subscriber = new Subscribers;
           $subscriber->name = $request->name ;
           $subscriber->email = $request->email ;
           $subscriber->save();

           Alert::success('Subscribed successfully','We will send you an email');

           return redirect()->back();
       }
           }

           public function view_subscribers (){
             $usertype = Auth::user()->usertype;
             if($usertype==1){

               $subscribers = Subscribers::where('id','>=',1)->latest()->paginate(10);

               return view('adminpages.view_subscribers',compact('subscribers'));



             }else{
               return redirect('/redirect');
         }
           }

           public function delete_subscriber($id){
             $usertype = Auth::user()->usertype;
             if($usertype==1){
             $subscriber = Subscribers::find($id);
             $subscriber->delete();

             Alert::success('','Subscriber deleted successfully');

             return redirect()->back();


             }else{
            return redirect('/redirect');
          }
           }

           public function subscriber_mail($id){
             $usertype = Auth::user()->usertype;
             if($usertype==1){
               $subscriber = Subscribers::find($id);

               return view('adminpages.subscriber_mail',compact('subscriber'));

             }else{
            return redirect('/redirect');
          }
           }

           public function send_subscriber_mail(request $request, $id){
             $usertype = Auth::user()->usertype;
          if($usertype==1){
              $subscriber = Subscribers::find($id);

              $details=[
                'greeting'=>$request->greeting,
                'description'=>$request->description,
                'body'=>$request->body,
                'button'=>$request->button,
                'link'=>$request->link,
                'lastline'=>$request->lastline,
              ];

              Notification::send($subscriber, new subscriberNotification($details));

              Alert::success('','Mail sent successfully');

              return redirect('/view_subscribers');


          }else{
            return redirect('/redirect');
          }
           }

           public function search_subscriber(request $request){
             $search = $request->search;

             $subscribers = Subscribers::where('name','like','%'.$search.'%')->orwhere('email','like','%'.$search.'%')->latest()->paginate(10);

             return view ('adminpages.view_subscribers',compact('subscribers'));
           }

           public function add_contact (request $request){
             if(Auth::id()){
             $usertype = Auth::user()->usertype;
             if($usertype==1){

               $contact = new Contact;
               $contact->name = $request->name ;
               $contact->email = $request->email ;
               $contact->phone = $request->phone ;

               $contact->save();

               Alert::success('Message sent','You will hear from us soon');

               return redirect()->back();



             }else{
               return redirect('/redirect');
         }
       }else {
               $contact = new Contact;
               $contact->name = $request->name ;
               $contact->email = $request->email ;
               $contact->phone = $request->phone ;
               $contact->comment = $request->comment ;
               $contact->save();


              Alert::success('Message sent','You will hear from us soon');

           return redirect()->back();
       }
           }

           // view contact
           public function view_contacts (){
             $usertype = Auth::user()->usertype;
             if($usertype==1){

               $contacts = Contact::where('id','>=',1)->latest()->paginate(10);

               return view('adminpages.view_contacts',compact('contacts'));

             }else{
               return redirect('/redirect');
         }
           }
           // viewing contact details
           public function contact_details ($id){
             $usertype = Auth::user()->usertype;
             if($usertype==1){
               $contact = Contact::find($id);
               return view('adminpages.contact_details',compact('contact'));

             }else{
               return redirect('/redirect');
         }
           }
           // deleting contact
           public function delete_contact ($id){
             $usertype = Auth::user()->usertype;
             if($usertype==1){
               $contact = Contact::find($id);
               $contact->delete();

               Alert::success('','Contact deleted successfully');
               return redirect()->back();

             }else{
               return redirect('/redirect');
         }
           }
           // Sending contact mail view blade
           public function contact_mail ($id){
             $usertype = Auth::user()->usertype;
             if($usertype==1){
                $contact = Contact::find($id);
                return view ('adminpages.contact_mail',compact('contact'));
             }else{
               return redirect('/redirect');
         }
           }

          // Sending contact an email
           public function send_contact_mail (request $request,$id){
             $usertype = Auth::user()->usertype;
             if($usertype==1){
                $contact = Contact::find($id);

                $details=[
                  'greeting'=>$request->greeting,
                  'description'=>$request->description,
                  'body'=>$request->body,
                  'button'=>$request->button,
                  'link'=>$request->link,
                  'lastline'=>$request->lastline,
                ];

                Notification::send($contact, new contactNotification($details));

                Alert::success('','Mail sent successfully');

                return redirect('/view_contacts');


             }else{
               return redirect('/redirect');
         }
           }

           public function add_basket_game (){
             $usertype = Auth::user()->usertype;
             if($usertype==1){
               return view('adminpages.add_basketball');
             }else{
               return redirect('/redirect');
         }
           }

           public function save_basket_game(request $request){
             $usertype = Auth::user()->usertype;
             if($usertype==1){
                $game = new Basketball ;
                $game->league = $request->league ;
                $game->game = $request->game ;
                $game->time = $request->time ;
                $game->odds = $request->odds ;
                $game->prediction = $request->prediction ;
                $game->category = $request->category ;
                $game->save();

                Alert::success('','Basketball game uploaded successfully');

                return redirect()->back();

             }else{
               return redirect('/redirect');
         }
           }
           // basket overs
           public function basket_overs(){
             $usertype = Auth::user()->usertype;
             if($usertype==1){
               $basket_overs = Basketball::where('category','=',"Overs/Unders")->paginate(10);
               return view('adminpages.basket_overs',compact('basket_overs'));
             }else{
               return redirect('/redirect');
         }
           }
           // basket overs match won and lost
           public function basket_match_won($id){
             $usertype = Auth::user()->usertype;
             if($usertype==1){
               $game = Basketball::find($id);
               $game->check = 'won';
               $game->save();
               Alert::success('','Basket game won');
               return redirect()->back();
             }else{
               return redirect('/redirect');
         }
           }

           public function basket_match_lost($id){
             $usertype = Auth::user()->usertype;
             if($usertype==1){
               $game = Basketball::find($id);
               $game->check = 'lost';
               $game->save();
               Alert::warning('','Basket game lost');
               return redirect()->back();
             }else{
               return redirect('/redirect');
         }
       }
        // editing basketball overs
             public function basket_game_edit($id){
               $usertype = Auth::user()->usertype;
               if($usertype==1){
                  $game = Basketball::find($id);
                  return view('adminpages.basket_game_edit',compact('game'));
               }else{
                 return redirect('/redirect');
           }
         }
    // updating basket ball game
            public function update_basket_game(request $request, $id){
                $usertype = Auth::user()->usertype;
                if($usertype==1){
                  $game = Basketball::find($id);
                  $game->league = $request->league;
                  $game->game = $request->game;
                  $game->time = $request->time;
                  $game->prediction = $request->prediction;
                  $game->odds = $request->odds;
                  $game->category = $request->category;
                  $game->check ='pending';
                  $game->save();

                  Alert::success('','Basketball game updated successfully');

                  return redirect()->back();

                }else{
               return redirect('/redirect');
             }

              }

              public function basket_straight(){
                $usertype = Auth::user()->usertype;
                if($usertype==1){
                  $basket_straight = Basketball::where('category','=',"Straight win")->paginate(10);
                  return view('adminpages.basket_straight',compact('basket_straight'));
                }else{
                  return redirect('/redirect');
            }
              }

              // searching through basketball games
              public function search_basket_straight(request $request){
                $usertype = Auth::user()->usertype;
                if($usertype==1){
                  $search = $request->search ;
                  $basket_straight =Basketball::where('category','=',"Straight win")->where('game','like','%'.$search.'%')->latest()->paginate(10);
                  return view('adminpages.basket_straight',compact('basket_straight'));
                }else{
                  return redirect('/redirect');
            }
              }

              public function search_basket_overs(request $request){
                $usertype = Auth::user()->usertype;
                if($usertype==1){
                  $search = $request->search ;
                  $basket_overs =Basketball:: where('category','=',"Overs/Unders")->where('game','like','%'.$search.'%')->latest()->paginate(10);
                  return view('adminpages.basket_overs',compact('basket_overs'));
                }else{
                  return redirect('/redirect');
            }
              }

              // adding tennis games
              public function add_tennis_game(){
                $usertype = Auth::user()->usertype;
                if($usertype==1){
                 return view('adminpages.add_tennis_game');
                }else{
                  return redirect('/redirect');
            }
              }

              public function save_tennis_game(request $request){
                $usertype = Auth::user()->usertype;
                if($usertype==1){
                  $game = new Tennis ;
                  $game->league = $request->league ;
                  $game->game = $request->game ;
                  $game->time = $request->time ;
                  $game->odds = $request->odds ;
                  $game->prediction = $request->prediction ;
                  $game->category = $request->category ;
                  $game->save();

                  Alert::success('','Tennis game uploaded successfully');

                  return redirect()->back();
                }else{
                  return redirect('/redirect');
            }
              }

              public function tennis_straight(){
                $usertype = Auth::user()->usertype;
                if($usertype==1){
                  $tennis_straight = Tennis::where('category','=',"Straight win")->paginate(10);

                  return view('adminpages.tennis_straight',compact('tennis_straight'));
                }else{
                  return redirect('/redirect');
            }
              }

              public function search_tennis_straight(request $request){
                $usertype = Auth::user()->usertype;
                if($usertype==1){
                  $search = $request->search ;
                  $tennis_straight =Tennis::where('category','=',"Straight win")->where('game','like','%'.$search.'%')->latest()->paginate(10);
                  return view('adminpages.tennis_straight',compact('tennis_straight'));
                }else{
                  return redirect('/redirect');
            }
              }

              public function tennis_match_won($id){
                $usertype = Auth::user()->usertype;
                if($usertype==1){
                  $game = Tennis::find($id);
                  $game->check = 'won';
                  $game->save();
                  Alert::success('','Tennis game won');
                  return redirect()->back();
                }else{
                  return redirect('/redirect');
            }
          }

          public function tennis_match_lost($id){
            $usertype = Auth::user()->usertype;
            if($usertype==1){
              $game = Tennis::find($id);
              $game->check = 'lost';
              $game->save();
              Alert::warning('','Tennis game lost');
              return redirect()->back();
            }else{
              return redirect('/redirect');
        }
      }

        public function tennis_game_edit($id){
            $usertype = Auth::user()->usertype;
            if($usertype==1){
               $game = Tennis::find($id);
               return view('adminpages.tennis_game_edit',compact('game'));
        }else{
          return redirect('/redirect');
    }
  }


      public function update_tennis_game(request $request, $id){
          $usertype = Auth::user()->usertype;
          if($usertype==1){
            $game = Tennis::find($id);
            $game->league = $request->league;
            $game->game = $request->game;
            $game->time = $request->time;
            $game->prediction = $request->prediction;
            $game->odds = $request->odds;
            $game->category = $request->category;
            $game->check ='pending';
            $game->save();

            Alert::success('','Tennis game updated successfully');

            return redirect()->back();

      }else{
     return redirect('/redirect');
   }

    }

    public function as(){
      $usertype = Auth::user()->usertype;
      if($usertype==1){
          $number = activeSubscribers::where('id','=',1)->value('number');

            $number_id = activeSubscribers::where('id','=',1)->value('id');

        return view('adminpages.as',compact('number','number_id'));


      }else{
        return redirect('/redirect');
  }
}


      public function save_as(request $request){
          $usertype = Auth::user()->usertype;
          if($usertype==1){
            $as =  new activeSubscribers;
            $as->number = $request->number;

            $as->save();

            Alert::success('','As saved');

            return redirect()->back();

      }else{
     return redirect('/redirect');
   }
    }

    public function edit_as(){
      $usertype = Auth::user()->usertype;
      if($usertype==1){
          $number = activeSubscribers::where('id','=',1)->value('number');

            $number_id = activeSubscribers::where('id','=',1)->value('id');

        return view('adminpages.as',compact('number','number_id'));


      }else{
        return redirect('/redirect');
  }
}

public function delete_all_games(){
  $usertype = Auth::user()->usertype;
  if($usertype==1){
    $games= Soccer::where('id','>=',1)->Where('category','!=','Weekend prediction')->get();

     foreach($games as $game){
       $game->delete();
     }

    Alert::success('','All games deleted successfully');

    return redirect()->back();

  }else{
    return redirect('/redirect');
}
}


public function delete_over_basketball($id){
  $usertype = Auth::user()->usertype;
  if($usertype==1){
     $game = Basketball::find($id);
     $game->delete();

    Alert::success('','game deleted successfully');
    return redirect()->back();

  }else{
    return redirect('/redirect');
}
}

public function delete_all_basketball(){
  $usertype = Auth::user()->usertype;
  if($usertype==1){
      Basketball::getQuery()->delete();

    Alert::success('','Basketball games deleted successfully');
    return redirect()->back();

  }else{
    return redirect('/redirect');
}
}

public function delete_tennis_games(){
  $usertype = Auth::user()->usertype;
  if($usertype==1){
     $game = Tennis::getQuery()->delete();

    Alert::success('','Tennis games deleted successfully');
    return redirect()->back();

  }else{
    return redirect('/redirect');
}

}
public function delete_scorer($id){
  $usertype = Auth::user()->usertype;
  if($usertype==1){
     $game = Scorer::find($id);
     $game->delete();

    Alert::success('','Scorer game deleted');
    return redirect()->back();

  }else{
    return redirect('/redirect');
}
}

public function remove_tennis_game($id){
  $usertype = Auth::user()->usertype;
  if($usertype==1){
     $game = Tennis::find($id);
     $game->delete();

    Alert::success('','Tennis game deleted');
    return redirect()->back();

  }else{
    return redirect('/redirect');
}
}

public function delete_football_game($id){
  $usertype = Auth::user()->usertype;
  if($usertype==1){
     $game = Soccer::find($id);
     $game->delete();

    Alert::success('','Soccer game deleted');
    return redirect()->back();

  }else{
    return redirect('/redirect');
}
}

public function message_subscribers(){
  $usertype = Auth::user()->usertype;
  if($usertype==1){

    return view ('adminpages.message_subscribers');

  }else{
    return redirect('/redirect');
}
}



public function mail_all_subscribers(request $request){
  $usertype = Auth::user()->usertype;
if($usertype==1){
   $subscribers = Subscribers::all();

   foreach($subscribers as $subscriber){
   $details=[
     'greeting'=>$request->greeting,
     'description'=>$request->description,
     'body'=>$request->body,
     'button'=>$request->button,
     'link'=>$request->link,
     'lastline'=>$request->lastline,
   ];

   Notification::send($subscriber, new subscriberNotification($details));
 }

   Alert::success('','Mail sent successfully');

   return redirect('/view_subscribers');


}else{
 return redirect('/redirect');
}
}

public function remove_football_straight($id){
  $usertype = Auth::user()->usertype;
  if($usertype==1){
    $game = Soccer::find($id);
    $game->delete();
    Alert::success('','Game deleted successfully');
    return redirect()->back();

  }else{
    return redirect('/redirect');
}
}

public function basket_straight_delete($id){
  $usertype = Auth::user()->usertype;
  if($usertype==1){
    $game = Basketball::find($id);
    $game->delete();
    Alert::success('','Game deleted successfully');
    return redirect()->back();

  }else{
    return redirect('/redirect');
}
}

public function basket_overs_delete($id){
  $usertype = Auth::user()->usertype;
  if($usertype==1){
    $game = Basketball::find($id);
    $game->delete();
    Alert::success('','Game deleted successfully');
    return redirect()->back();

  }else{
    return redirect('/redirect');
}
}

public function delete_all_weekend(){
  $usertype = Auth::user()->usertype;
  if($usertype==1){
      $games = Soccer::where('category','=','Weekend prediction')->get();
      foreach($games as $game){
        $game->delete();
      }
    Alert::success('','Weekend games deleted successfully');
    return redirect()->back();
  }else{
    return redirect('/redirect');
}
}

//end of controller class 
}
