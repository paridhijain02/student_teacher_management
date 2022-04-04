<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Students;
use App\Teachers;
use App\Alls;
use App\Assignments;
use App\Studentassignments;
class ProjectController extends Controller
{
    public function welcome(Request $r)
    {
        return view('welcome');
    }
    public function studentLogin()
    {
        if(session()->has('username'))
        {
            return redirect('sprofilee'); 
        }
        else
        {
            return view("student_login");
        } 
    }
    public function studentPostLogin(Request $r)
    {
        $this->validate($r, 
            [
                'username' => 'required',
                'password' => 'required'
            ]
            );
        $a_user=Students::where('username',$r->input('username'))->get();
        $st = isset($a_user[0]) ? $a_user[0] : false;
        if ($st)
        {
            if($a_user[0]->password==$r->input('password'))
            {
                $data_username=$r->input('username');
                $r->session()->put('username',$data_username); 
                return redirect('sprofilee'); 
            }
        }
        else
        {
            return redirect('notexist') ;
        }
    }
    public function teacherLogin()
    {
        if(session()->has('username'))
        {
            return redirect('tprofilee'); 
        }
        else
        {
            return view("teacher_login");
        } 
    }
    public function teacherPostLogin(Request $r)
    {
        $this->validate($r, 
            [
                'username' => 'required',
                'password' => 'required'
            ]
            );
        $a_user=Teachers::where('username',$r->input('username'))->get();
        $st = isset($a_user[0]) ? $a_user[0] : false;
        if ($st)
        {
            if($a_user[0]->password==$r->input('password'))
            {
                $data_username=$r->input('username');
                $r->session()->put('username',$data_username); 
                return redirect('tprofilee'); 
            }
        }
        else
        {
            return redirect('notexist') ;
        }
    }
    public function studentRegistered()
    {
        return view('ssignup');
    }
    public function studentStore(Request $request)
    {
        $this->validate($request, 
            [
                'name' => 'required',
                'username' => 'required',
                'password' => 'required|confirmed',
                'password_confirmation'=>'required',
                'gender' => 'required',
                'course' => 'required',
                'year' => 'required'
            ]
            );
        echo "<pre>";
        print_r($request->all());

        $student=new Students;
        $student->name=$request['name'];
        $student->username=$request['username'];
        $student->course=$request['course'];
        $student->year=$request['year'];
        $student->gender=$request['gender'];
        $student->password=$request['password'];
        $student->save();

        $students=new Alls;
        //$students->name=$request['name'];
        $students->username=$request['username'];
        // $students->course=$request['course'];
        // $students->year=$request['year'];
        // $students->gender=$request['gender'];
        $students->password=$request['password'];
        $students->role="student";
        $students->save();
        return redirect("/sview");
    }
    public function teacherRegistered()
    {
        return view('tsignup');
    }
    public function teacherStore(Request $request)
    {
        $this->validate($request, 
            [
                'name' => 'required',
               // 'username' => 'required|email',
                'username' => 'required',
                'password' => 'required|confirmed',
                'password_confirmation'=>'required',
                'gender' => 'required',
                'course' => 'required'
            ]
            );
        echo "<pre>";
        print_r($request->all());
        
        $teacher=new Teachers;
        $teacher->name=$request['name'];
        $teacher->username=$request['username'];
        $teacher->course=$request['course'];
        $teacher->gender=$request['gender'];
        $teacher->password=$request['password'];
        $teacher->save();

        $students=new Alls;
        //$students->name=$request['name'];
        $students->username=$request['username'];
        // $students->course=$request['course'];
        // $students->year=$request['year'];
        // $students->gender=$request['gender'];
        $students->password=$request['password'];
        $students->role="teacher";
        $students->save();
        return redirect("/tview");
    }
    public function studentView(Request $request)
    {
        $search=$request['search']??"";
        if($search!="")
        {
            $c=Students::where('name','=',$search)->orwhere('username','=',$search)->orwhere('course','=',$search)->paginate(3);
        }
        else
        {
           // $c=Students::all();
           $c=Students::paginate(3);
        }        
        $data=compact('c','search');
       return view('student-view')->with($data);
    }
    public function teacherView(Request $request)
    {
        $search=$request['search']??"";
        if($search!="")
        {
            $t=Teachers::where('name','=',$search)->orwhere('username','=',$search)->orwhere('course','=',$search)->paginate(3);
        }
        else
        {
            $t=Teachers::paginate(3);
        }        
        $data=compact('t','search');
       return view('teacher-view')->with($data);
    }
    


    public function studentProfile()
    {
        if(session()->has('username'))
        {
            $anyteacherbychance=Teachers::where('username',session('username'))->get();
            //echo $anyteacherbychance;
            // if   ($anyteacherbychance=='[]')    
            // {
            //     echo '1gregger';
            // }    
            if($anyteacherbychance!='[]')
            {
                return redirect("/notloggedin");
            }
            //$this->rolee="student";
            $c=Students::all();
            $a=Assignments::get();
            $t=Teachers::get();
            //$wh=DB::table('students')
            $you=Students::where('username',session('username'))->get();
            
           
            $data=compact('c','a','you','t');
           return view('student_profile')->with($data);
        }
        else
        {
            return redirect("/slogin");
        } 
    }
    public function teacherProfile(Request $request)
    {
        if(session()->has('username'))
        {
            $anystudentbychance=Students::where('username',session('username'))->get();
            if($anystudentbychance!="[]")
            {
                return redirect("/notloggedin");
            }
            
            //$this->rolee="teacher";
            $s=Students::get();
            //print_r (dd(session()->all()));

            $search=$request['search']??"";
            if($search!="")
            {
                $t=Teachers::where('name','=',$search)->orwhere('username','=',$search)->orwhere('course','=',$search)->paginate(3);
            }
            else
            {
                $t=Teachers::paginate(3);
            }        
            //$t=Teachers::all();
            $you=Teachers::where('username',session('username'))->get();
            $data=compact('s','t','you','search');
            return view('teacher_profile')->with($data);     
        }
        else
        {
            return redirect("/tlogin");
        } 
    }
    public function notExist()
    {
       return view('notexist');
    }
    public function notLoggedIn()
    {
       return view('notloggedin');
    }
    public function studentDelete($id)
    {
        $c=Students::find($id);
        if(!is_null($c))
        {
            $c->delete();
        }
        return redirect('/tprofilee');
    }
    public function studentEdit($id)
    {
        if(session()->has('username'))
        {
            $c=Students::find($id);
            if(!is_null($c))
            {
                $title="Update Your student";
                $url=url('/tprofilee/s_update') ."/". $id;
                $data=compact('c','url','title');
                return view('student-update')->with($data);
            }
            //return redirect('/customers/view');
            else
            {
                return redirect('/tprofilee');
            }   
        }
         else
         {
            return redirect("/tlogin");
         }
    }
    public function studentUpdate($id, Request $request)
    {
        $customer=Students::find($id);
        $customer->name=$request['name'];
        $customer->username=$request['username'];
        $customer->course=$request['course'];
        $customer->gender=$request['gender'];
        $customer->year=$request['year'];
        $customer->save();
        //return redirect('customers');
        //customers/view
        return redirect("/tprofilee");
    }
    public function teacherDelete($id)
    {
        $c=Teachers::find($id);
        if(!is_null($c))
        {
            $c->delete();
        }
        return redirect('/tprofilee');
    }
    public function teacherEdit($id)
    {
        if(session()->has('username'))
        {
            $c=Teachers::find($id);
            if(!is_null($c))
            {
                $title="Update Yourself";
                $url=url('/tprofilee/t_update') ."/". $id;
                $data=compact('c','url','title');
                return view('teacher-update')->with($data);
            }
            //return redirect('/customers/view');
            else
            {
                return redirect('/tprofilee');
            }  
        }
          else
          {
            return redirect("/tlogin");
          }
    }
    public function teacherUpdate($id, Request $request)
    {
        $customer=Teachers::find($id);
        $customer->name=$request['name'];
        $customer->username=$request['username'];
        $customer->course=$request['course'];
        $customer->gender=$request['gender'];
        $customer->save();
        //return redirect('customers');
        //customers/view
        return redirect("/tprofilee");
    }
    public function createNewAssignment()
    {  
        if(session()->has('username'))
        {
            $you=Teachers::where('username',session('username'))->get(); 
            $data=compact('you');
            return view('create_assignment')->with($data);
        }
        else
          {
            return redirect("/tlogin");
          }
    }
    public function createNewAssignmentPost(Request $request)
    {
        $this->validate($request, 
            [
                'assignment' => 'required',
               // 'username' => 'required|email',
            ]
            );
        $you=Teachers::where('username',session('username'))->get();
        print_r($you);
        $assignment=new Assignments;
        $assignment->username=$request->session()->get('username');
        
        $assignment->course=$request['course'];
        $assignment->assignment=$request['assignment'];
        $assignment->save();
        return redirect("/tprofilee");
    }
    public function teacherMyAsssignment()
    {  
        if(session()->has('username'))
        {
            $c=Assignments::get();  
            $you=Teachers::where('username',session('username'))->get();      
            $data=compact('c','you');
            return view('my_assignments')->with($data);
        }
        else
          {
            return redirect("/tlogin");
          }
    }
    public function assignmentDelete($id)
    {  
        if(session()->has('username'))
        {
            $as=Assignments::find($id);
            if(!is_null($as))
            {
                $as->delete();
            }
            return redirect('/my_assignments');
        }
        else
          {
            return redirect("/tlogin");
          }
    }


    public function assignmentWrite($id)
    {
        if(session()->has('username'))
        {
            $you=Students::where('username',session('username'))->get(); 
            $a=Assignments::find($id);
            $as=Assignments::where('id',$id)->get(); 
            if(!is_null($a))
            {
                $url=url('/sprofilee/assignment_write_post') ."/". $id;
                $data=compact('a','url','you','as');
                return view('student-assignmet-update')->with($data);
            }
            //return redirect('/customers/view');
            else
            {
                return redirect('/sprofilee');
            }    
        }
        else
        {
            return redirect("/slogin");
        }
    }
    public function assignmentWritePost($id, Request $request)
    {
        $this->validate($request, 
        [
            'done_assignment' => 'required'
        ]
        );
        //$assignment=Assignments::find($id);
        $assignment=new Studentassignments;
        $assignment->student_name=$request['student_name'];
        $assignment->teacher_name=$request['teacher_name'];
        $assignment->done_assignment=$request['done_assignment'];
        $assignment->course=$request['course'];
        $assignment->assignment=$request['assignment'];
        $assignment->save();
        echo "<pre>";
        print_r($request->all());
        return redirect("/sprofilee");
    }

    public function studentAssignmentToTeacher()
    {
        if(session()->has('username'))
        {
            $as=Studentassignments::get();  
            $you=Teachers::where('username',session('username'))->get();      
            $data=compact('as','you');
            return view('student_assignment_view')->with($data);
        }
        else
        {
            return redirect("/slogin");
        }
    }
    
}
