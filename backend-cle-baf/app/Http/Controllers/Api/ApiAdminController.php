<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\LevelResource;
use App\Http\Resources\StudentResource;
use App\Http\Resources\UnitResource;
use App\Http\Resources\ExamenResource;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\AnswerResource;
use App\Http\Resources\LessonResource;
use App\Http\Resources\AppartenirResource;
use App\Http\Resources\ComposerResource;
use App\Models\Level;
use App\Models\Student;
use App\Models\Unit;
use App\Models\Examen;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Lesson;
use App\Models\Appartenir;
use App\Models\Composer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiAdminController extends Controller
{
    // Levels
    public function indexLevels(Request $request)
    {
        // Load levels with their units and appartenirs;
        $levels = Level::with(['units', 'appartenirs'])->get();
        return response()->json([
            'data' => LevelResource::collection($levels)
        ]);
    }

    public function storeLevel(Request $request)
    {
        $validated = $request->validate([
            'intitule' => 'required|string|max:255',
            'description' => 'required',
            'objectifs' => 'required',
        ]);

        $level = Level::create($validated);
        return new LevelResource($level);
    }

    public function updateLevel(Request $request, $id)
    {
        $validated = $request->validate([
            'intitule' => 'required|string|max:255',
            'description' => 'required',
            'objectifs' => 'required',
        ]);

        $level = Level::findOrFail($id);
        $level->update($validated);
        return new LevelResource($level);
    }

    public function destroyLevel($id)
    {
        $level = Level::findOrFail($id);
        $level->delete();
        return response()->json(['message' => 'Level deleted']);
    }

    public function showLevelBySlug($slug)
    {
        $level = Level::with(['units', 'appartenirs'])->where('slug', $slug)->firstOrFail();

        return new LevelResource($level);
    }

    // Students
    public function indexStudents(Request $request)
    {
        $students = Student::all();
        return response()->json([
            'data' => StudentResource::collection($students)
        ]);
    }

    public function storeStudent(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'tel' => 'required|string|max:20',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|string|min:6',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $student = Student::create($validated);
        return new StudentResource($student);
    }

    public function updateStudent(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'tel' => 'required|string|max:20',
            'email' => 'required|email|unique:students,email,' . $id,
            'password' => 'sometimes|string|min:6',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        }

        $student = Student::findOrFail($id);
        $student->update($validated);
        return new StudentResource($student);
    }

    public function destroyStudent($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return response()->json(['message' => 'Student deleted']);
    }

    public function showStudentBySlug($slug)
    {
        $level = Student::all()->where('slug', $slug)->firstOrFail();

        return new StudentResource($level);
    }

    // Units
    public function indexUnits(Request $request)
    {
        $units = Unit::with('level')->get();
        return response()->json([
            'data' => UnitResource::collection($units)
        ]);
    }

    public function storeUnit(Request $request)
    {
        $validated = $request->validate([
            'intitule' => 'required|string|max:255',
            'description' => 'required',
            'objectifs' => 'required',
            'level_id' => 'required|exists:levels,id',
        ]);

        $unit = Unit::create($validated);
        return new UnitResource($unit);
    }

    public function updateUnit(Request $request, $id)
    {
        $validated = $request->validate([
            'intitule' => 'required|string|max:255',
            'description' => 'required',
            'objectifs' => 'required',
            'level_id' => 'required|exists:levels,id',
        ]);

        $unit = Unit::findOrFail($id);
        $unit->update($validated);
        return new UnitResource($unit);
    }

    public function destroyUnit($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();
        return response()->json(['message' => 'Unit deleted']);
    }

    public function showUnitBySlug($slug)
    {
        $level = Unit::with('level')->where('slug', $slug)->firstOrFail();

        return new UnitResource($level);
    }

    // Examens
    public function indexExamens(Request $request)
    {
        $examens = Examen::with('unit')->get();
        return response()->json([
            'data' => ExamenResource::collection($examens)
        ]);
    }

    public function storeExamen(Request $request)
    {
        $validated = $request->validate([
            'intitule' => 'required|string|max:255',
            'unit_id' => 'required|exists:units,id',
            'duree' => 'required|integer',
            'type' => 'required|string',
            'etat' => 'boolean',
            'description' => 'required|string',
            'objectifs' => 'required|string',
            'nbre_points' => 'required|integer',
            'nbre_passage' => 'required|integer',
        ]);

        $examen = Examen::create($validated);
        return new ExamenResource($examen);
    }

    public function updateExamen(Request $request, $id)
    {
        $validated = $request->validate([
            'intitule' => 'required|string|max:255',
            'unit_id' => 'required|exists:units,id',
            'duree' => 'required|integer',
            'type' => 'required|string',
            'etat' => 'boolean',
            'nbre_points' => 'required|integer',
            'nbre_passage' => 'required|integer',
        ]);

        $examen = Examen::findOrFail($id);
        $examen->update($validated);
        return new ExamenResource($examen);
    }

    public function destroyExamen($id)
    {
        $examen = Examen::findOrFail($id);
        $examen->delete();
        return response()->json(['message' => 'Examen deleted']);
    }

    public function showExamenBySlug($slug)
    {
        $level = Examen::with('unit')->where('slug', $slug)->firstOrFail();

        return new ExamenResource($level);
    }

    // Questions
    public function indexQuestions(Request $request)
    {
        $questions = Question::with('examen')->get();
        return response()->json([
            'data' => QuestionResource::collection($questions)
        ]);
    }

    public function storeQuestion(Request $request)
    {
        $validated = $request->validate([
            'intitule' => 'required|string|max:255',
            'type' => 'required|string',
            'examen_id' => 'required|exists:examens,id',
            'nbre_points' => 'required|integer',
        ]);

        $question = Question::create($validated);
        return new QuestionResource($question);
    }

    public function updateQuestion(Request $request, $id)
    {
        $validated = $request->validate([
            'intitule' => 'required|string|max:255',
            'type' => 'required|string',
            'examen_id' => 'required|exists:examens,id',
            'nbre_points' => 'required|integer',
        ]);

        $question = Question::findOrFail($id);
        $question->update($validated);
        return new QuestionResource($question);
    }

    public function destroyQuestion($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        return response()->json(['message' => 'Question deleted']);
    }

    public function showQuestionBySlug($slug)
    {
        $level = Question::with('examen')->where('slug', $slug)->firstOrFail();

        return new QuestionResource($level);
    }

    // Answers
    public function indexAnswers(Request $request)
    {
        $answers = Answer::with('question')->get();
        return response()->json([
            'data' => AnswerResource::collection($answers)
        ]);
    }

    public function storeAnswer(Request $request)
    {
        $validated = $request->validate([
            'intitule' => 'required|string|max:255',
            'type' => 'required|string',
            'is_correct' => 'required|boolean',
            'question_id' => 'required|exists:questions,id',
        ]);

        $answer = Answer::create($validated);
        return new AnswerResource($answer);
    }

    public function updateAnswer(Request $request, $id)
    {
        $validated = $request->validate([
            'intitule' => 'required|string|max:255',
            'type' => 'required|string',
            'is_correct' => 'required|boolean',
            'question_id' => 'required|exists:questions,id',
        ]);

        $answer = Answer::findOrFail($id);
        $answer->update($validated);
        return new AnswerResource($answer);
    }

    public function destroyAnswer($id)
    {
        $answer = Answer::findOrFail($id);
        $answer->delete();
        return response()->json(['message' => 'Answer deleted']);
    }

    public function showAnswerBySlug($slug)
    {
        $level = Answer::with('question')->where('slug', $slug)->firstOrFail();

        return new AnswerResource($level);
    }

    // Lessons
    public function indexLessons(Request $request)
    {
        $lessons = Lesson::with('unit')->get();
        return response()->json([
            'data' => LessonResource::collection($lessons)
        ]);
    }

    public function storeLesson(Request $request)
    {
        $validated = $request->validate([
            'intitule' => 'required|string|max:255',
            'description' => 'required',
            'unit_id' => 'required|exists:units,id',
            'type' => 'required|string', // Ajoute 'type' manquant dans la validation
            'lien' => 'required|url',    // Ajoute 'lien' manquant dans la validation
            'objectifs' => 'required',   // Ajoute 'objectifs' manquant dans la validation
        ]);

        $lesson = Lesson::create($validated);
        return new LessonResource($lesson);
    }

    public function updateLesson(Request $request, $id)
    {
        $validated = $request->validate([
            'intitule' => 'required|string|max:255',
            'contenu' => 'required',
            'unit_id' => 'required|exists:units,id',
            'ordre' => 'required|integer',
        ]);

        $lesson = Lesson::findOrFail($id);
        $lesson->update($validated);
        return new LessonResource($lesson);
    }

    public function destroyLesson($id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->delete();
        return response()->json(['message' => 'Lesson deleted']);
    }

    public function showLessonBySlug($slug)
    {
        $level = Lesson::with('unit')->where('slug', $slug)->firstOrFail();

        return new LessonResource($level);
    }

    // Appartenir
    public function indexAppartenir(Request $request)
    {
        $appartenirs = Appartenir::with(['student', 'level'])->get();
        return response()->json([
            'data' => AppartenirResource::collection($appartenirs)
        ]);
    }

    public function storeAppartenir(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'level_id' => 'required|exists:levels,id',
            'date_inscription' => 'required|date',
            'statut' => 'required|string',
        ]);

        $appartenir = Appartenir::create($validated);
        return new AppartenirResource($appartenir);
    }

    public function updateAppartenir(Request $request, $id)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'level_id' => 'required|exists:levels,id',
            'date_inscription' => 'required|date',
            'statut' => 'required|string',
        ]);

        $appartenir = Appartenir::findOrFail($id);
        $appartenir->update($validated);
        return new AppartenirResource($appartenir);
    }

    public function destroyAppartenir($id)
    {
        $appartenir = Appartenir::findOrFail($id);
        $appartenir->delete();
        return response()->json(['message' => 'Appartenir deleted']);
    }

    public function showAppartenirBySlug($slug)
    {
        $level = Appartenir::with(['student', 'level'])->where('slug', $slug)->firstOrFail();

        return new AppartenirResource($level);
    }

    // Composer
    public function indexComposer(Request $request)
    {
        $composers = Composer::with(['question', 'answer'])->get();
        return response()->json([
            'data' => ComposerResource::collection($composers)
        ]);
    }

    public function storeComposer(Request $request)
    {
        $validated = $request->validate([
            'question_id' => 'required|exists:questions,id',
            'answer_id' => 'required|exists:answers,id',
        ]);

        $composer = Composer::create($validated);
        return new ComposerResource($composer);
    }

    public function updateComposer(Request $request, $id)
    {
        $validated = $request->validate([
            'question_id' => 'required|exists:questions,id',
            'answer_id' => 'required|exists:answers,id',
        ]);

        $composer = Composer::findOrFail($id);
        $composer->update($validated);
        return new ComposerResource($composer);
    }

    public function destroyComposer($id)
    {
        $composer = Composer::findOrFail($id);
        $composer->delete();
        return response()->json(['message' => 'Composer deleted']);
    }

    public function showComposerBySlug($slug)
    {
        $level = Composer::with(['question', 'answer'])->where('slug', $slug)->firstOrFail();

        return new ComposerResource($level);
    }

    // Utility methods
    public function getLevelUnits($levelId)
    {
        $units = Unit::where('level_id', $levelId)->get();
        return response()->json([
            'data' => UnitResource::collection($units)
        ]);
    }

    public function getUnitExamens($unitId)
    {
        $examens = Examen::where('unit_id', $unitId)->get();
        return response()->json([
            'data' => ExamenResource::collection($examens)
        ]);
    }

    public function getExamenQuestions($examenId)
    {
        $questions = Question::where('examen_id', $examenId)->get();
        return response()->json([
            'data' => QuestionResource::collection($questions)
        ]);
    }

    public function getQuestionAnswers($questionId)
    {
        $answers = Answer::where('question_id', $questionId)->get();
        return response()->json([
            'data' => AnswerResource::collection($answers)
        ]);
    }

    // Composer (Question-Examen relationships)
    public function indexComposers(Request $request)
    {
        $composers = Composer::with(['question', 'examen'])->get();
        return response()->json([
            'data' => ComposerResource::collection($composers)
        ]);
    }
}
