<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Cources;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role:Admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $topics = Topic::orderBy('created_at', 'DESC')->get();
        return view('Backend.Quiz.Topic.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('Backend.Quiz.Topic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validate = $this->validate($request, [
            'topic_name' => 'required|max:250',
            'duration' => 'nullable|numeric|min:1|max:60',
            'passing_grade' => 'nullable|numeric|min:1|max:100',
            're_take_cut' => 'nullable|numeric|min:1|max:100',
            'course_id' => 'nullable',
        ]);

        $create_topic = [
            'topic_name' => $request->topic_name,
            'duration_measure' => $request->duration_measure,
            'duration' => $request->duration,
            'passing_grade' => $request->passing_grade,
            're_take_cut' => $request->re_take_cut,
            'topic_subscription' => $request->topic_subscription,
            'course_id' => $request->course_id,
        ];

        Topic::create($create_topic);

        return redirect()->route('topics.index')->with('success', 'Topic created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $topic = Topic::with('courses')->findOrFail($id);
        $courses = Cources::all();
        return view('Backend.Quiz.Topic.edit', compact('topic', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validate = $this->validate($request, [
            'topic_name' => 'required|max:250',
            'duration' => 'nullable|numeric|min:1|max:60',
            'passing_grade' => 'nullable|numeric|min:1|max:100',
            're_take_cut' => 'nullable|numeric|min:1|max:100'
        ]);

        $update_topic = [
            'topic_name' => $request->topic_name,
            'duration_measure' => $request->duration_measure,
            'duration' => $request->duration,
            'passing_grade' => $request->passing_grade,
            're_take_cut' => $request->re_take_cut,
            'topic_subscription' => $request->topic_subscription,
            'course_id' => $request->course_id,
        ];

        Topic::where('id', $id)->update($update_topic);

        return redirect()->route('topics.index')->with('success', 'Topic updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Topic::where('id', $id)->delete();
        return redirect()->route('topics.index')->with('success', 'Topic deleted successfully.');
    }

    public function getCourses(Request $request)
    {
        $search = trim($request->search);
        $response = [];

        if ($search == '') {
            $courses = Cources::orderBy('course_name', 'desc')
                ->select('id', 'course_name')
                ->limt(5)
                ->get();
        } else {
            $courses = Cources::select('id', 'course_name')
                ->where('course_name', 'LIKE', '%' . $search . '%')
                ->get();
        }
        foreach ($courses as $course) {
            $response[] = array(
                'id' => $course->id,
                'course_name' => $course->course_name
            );
        }
        return response()->json($response);
    }
}