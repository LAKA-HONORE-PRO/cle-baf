<?php

namespace App\Http\Controllers;

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

class AdminController extends Controller
{
    // Dashboard
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Levels
    public function indexLevels(Request $request)
    {
        $levels = Level::all();
        
        if ($request->expectsJson()) {
            return response()->json([
                'data' => LevelResource::collection($levels)
            ]);
        }
        
        return view('admin.levels.index', compact('levels'));
    }

    public function storeLevel(Request $request)
    {
        $validated = $request->validate([
            'intitule' => 'required|string|max:255',
            'description' => 'required',
            'objectifs' => 'required',
        ]);
        
        $level = Level::create($validated);
        
        if ($request->expectsJson()) {
            return new LevelResource($level);
        }
        
        return redirect()->route('admin.dashboard')->with('success', 'Niveau créé avec succès');
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
        
        if ($request->expectsJson()) {
            return new LevelResource($level);
        }
        
        return redirect()->route('admin.levels')->with('success', 'Niveau mis à jour avec succès');
    }

    public function destroyLevel($id)
    {
        $level = Level::findOrFail($id);
        $level->delete();
        
        return response()->json(['message' => 'Level deleted']);
    }

    // Students
    public function indexStudents(Request $request)
    {
        $students = Student::all();
        
        if ($request->expectsJson()) {
            return response()->json([
                'data' => StudentResource::collection($students)
            ]);
        }
        
        return view('admin.students.index', compact('students'));
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
        
        if ($request->expectsJson()) {
            return new StudentResource($student);
        }
        
        return redirect()->route('admin.dashboard')->with('success', 'Étudiant créé avec succès');
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
        
        if ($request->expectsJson()) {
            return new StudentResource($student);
        }
        
        return redirect()->route('admin.students')->with('success', 'Étudiant mis à jour avec succès');
    }

    public function destroyStudent($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        
        return response()->json(['message' => 'Student deleted']);
    }

    // Units
    public function indexUnits(Request $request)
    {
        $units = Unit::with('level')->get();
        
        if ($request->expectsJson()) {
            return response()->json([
                'data' => UnitResource::collection($units)
            ]);
        }
        
        return view('admin.units.index', compact('units'));
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
        
        if ($request->expectsJson()) {
            return new UnitResource($unit);
        }
        
        return redirect()->route('admin.dashboard')->with('success', 'Unité créée avec succès');
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
        
        if ($request->expectsJson()) {
            return new UnitResource($unit);
        }
        
        return redirect()->route('admin.units')->with('success', 'Unité mise à jour avec succès');
    }

    public function destroyUnit($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();
        
        return response()->json(['message' => 'Unit deleted']);
    }

    // Examens
    public function indexExamens(Request $request)
    {
        $examens = Examen::with('unit')->get();
        
        if ($request->expectsJson()) {
            return response()->json([
                'data' => ExamenResource::collection($examens)
            ]);
        }
        
        return view('admin.examens.index', compact('examens'));
    }

    public function storeExamen(Request $request)
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
        
        $examen = Examen::create($validated);
        
        if ($request->expectsJson()) {
            return new ExamenResource($examen);
        }
        
        return redirect()->route('admin.dashboard')->with('success', 'Examen créé avec succès');
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
        
        if ($request->expectsJson()) {
            return new ExamenResource($examen);
        }
        
        return redirect()->route('admin.examens')->with('success', 'Examen mis à jour avec succès');
    }

    public function destroyExamen($id)
    {
        $examen = Examen::findOrFail($id);
        $examen->delete();
        
        return response()->json(['message' => 'Examen deleted']);
    }

    // Questions
    public function indexQuestions(Request $request)
    {
        $questions = Question::with('examen')->get();
        
        if ($request->expectsJson()) {
            return response()->json([
                'data' => QuestionResource::collection($questions)
            ]);
        }
        
        return view('admin.questions.index', compact('questions'));
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
        
        if ($request->expectsJson()) {
            return new QuestionResource($question);
        }
        
        return redirect()->route('admin.questions')->with('success', 'Question créée avec succès');
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
        
        if ($request->expectsJson()) {
            return new QuestionResource($question);
        }
        
        return redirect()->route('admin.questions')->with('success', 'Question mise à jour avec succès');
    }

    public function destroyQuestion($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        
        return response()->json(['message' => 'Question deleted']);
    }

    // Answers
    public function indexAnswers(Request $request)
    {
        $answers = Answer::with('question')->get();
        
        if ($request->expectsJson()) {
            return response()->json([
                'data' => AnswerResource::collection($answers)
            ]);
        }
        
        return view('admin.answers.index', compact('answers'));
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
        
        if ($request->expectsJson()) {
            return new AnswerResource($answer);
        }
        
        return redirect()->route('admin.dashboard')->with('success', 'Réponse créée avec succès');
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
        
        if ($request->expectsJson()) {
            return new AnswerResource($answer);
        }
        
        return redirect()->route('admin.answers')->with('success', 'Réponse mise à jour avec succès');
    }

    public function destroyAnswer($id)
    {
        $answer = Answer::findOrFail($id);
        $answer->delete();
        
        return response()->json(['message' => 'Answer deleted']);
    }

    // Lessons
    public function indexLessons(Request $request)
    {
        $lessons = Lesson::with('unit')->get();
        
        if ($request->expectsJson()) {
            return response()->json([
                'data' => LessonResource::collection($lessons)
            ]);
        }
        
        return view('admin.lessons.index', compact('lessons'));
    }

    public function storeLesson(Request $request)
    {
        $validated = $request->validate([
            'intitule' => 'required|string|max:255',
            'contenu' => 'required',
            'unit_id' => 'required|exists:units,id',
            'ordre' => 'required|integer',
        ]);
        
        $lesson = Lesson::create($validated);
        
        if ($request->expectsJson()) {
            return new LessonResource($lesson);
        }
        
        return redirect()->route('admin.dashboard')->with('success', 'Leçon créée avec succès');
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
        
        if ($request->expectsJson()) {
            return new LessonResource($lesson);
        }
        
        return redirect()->route('admin.lessons')->with('success', 'Leçon mise à jour avec succès');
    }

    public function destroyLesson($id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->delete();
        
        return response()->json(['message' => 'Lesson deleted']);
    }

    // Appartenir (Student-Level relationships)
    public function indexAppartenir(Request $request)
    {
        $appartenirs = Appartenir::with(['student', 'level'])->get();
        
        if ($request->expectsJson()) {
            return response()->json([
                'data' => AppartenirResource::collection($appartenirs)
            ]);
        }
        
        return view('admin.appartenir.index', compact('appartenirs'));
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
        
        if ($request->expectsJson()) {
            return new AppartenirResource($appartenir);
        }
        
        return redirect()->route('admin.dashboard')->with('success', 'Inscription créée avec succès');
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
        
        if ($request->expectsJson()) {
            return new AppartenirResource($appartenir);
        }
        
        return redirect()->route('admin.appartenir')->with('success', 'Inscription mise à jour avec succès');
    }

    public function destroyAppartenir($id)
    {
        $appartenir = Appartenir::findOrFail($id);
        $appartenir->delete();
        
        return response()->json(['message' => 'Appartenir deleted']);
    }

    // Composer (Question-Answer relationships)
    public function indexComposer(Request $request)
    {
        $composers = Composer::with(['question', 'answer'])->get();
        
        if ($request->expectsJson()) {
            return response()->json([
                'data' => ComposerResource::collection($composers)
            ]);
        }
        
        return view('admin.composer.index', compact('composers'));
    }

    public function storeComposer(Request $request)
    {
        $validated = $request->validate([
            'question_id' => 'required|exists:questions,id',
            'answer_id' => 'required|exists:answers,id',
        ]);
        
        $composer = Composer::create($validated);
        
        if ($request->expectsJson()) {
            return new ComposerResource($composer);
        }
        
        return redirect()->route('admin.dashboard')->with('success', 'Composition créée avec succès');
    }

    public function updateComposer(Request $request, $id)
    {
        $validated = $request->validate([
            'question_id' => 'required|exists:questions,id',
            'answer_id' => 'required|exists:answers,id',
        ]);
        
        $composer = Composer::findOrFail($id);
        $composer->update($validated);
        
        if ($request->expectsJson()) {
            return new ComposerResource($composer);
        }
        
        return redirect()->route('admin.composer')->with('success', 'Composition mise à jour avec succès');
    }

    public function destroyComposer($id)
    {
        $composer = Composer::findOrFail($id);
        $composer->delete();
        
        return response()->json(['message' => 'Composer deleted']);
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
        
        if ($request->expectsJson()) {
            return response()->json([
                'data' => ComposerResource::collection($composers)
            ]);
        }
        
        return view('admin.composers.index', compact('composers'));
    }
}