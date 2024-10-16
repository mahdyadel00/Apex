<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\Student\{
    AssignmentController,
    AssignmentTypeController,
    PostController,
    LessonController,
    SectionController,
    StudentController,
    ReportReasonController,
    ReportController,
    GradeController,
    EduYearController,
    SubjectController,
    TeacherController,
    CourseController,
    EnrollmentController,
    SubmissionController,
    SubmissionGradeController,
    FrindRequestController,
    UserBlockController,
    UserFrindController,
    GuardianController,
    BoardController,
    BoardListController,
    UserController,
    TeacherCommentController,
    BoardCommentController
};


Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    Route::get('student/{id}', [StudentController::class, 'show'])->name('students.show');
    Route::get('report-reasons', [ReportReasonController::class, 'index'])->name('report_reasons.index');
    //Report Route
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('reports/{id}', [ReportController::class, 'show'])->name('reports.show');
    Route::post('reports', [ReportController::class, 'store'])->name('reports.store');

    //Grade Route
    Route::get('grades', [GradeController::class, 'index'])->name('grades.index');


//    Route::get('student/{id}', [StudentController::class, 'show'])->name('students.show');
    Route::get('edu-years', [EduYearController::class, 'index'])->name('edu-years.index')->withoutMiddleware(['auth:sanctum', 'verified','accessRoutes:student','isBlocked']);
    Route::get('subjects', [SubjectController::class, 'index'])->name('subjects.index');
    Route::get('teachers/{id}', [TeacherController::class, 'show'])->name('teachers.show');

    // Course Group
    Route::apiResource('courses', CourseController::class)
        ->only(['index', 'show']);

    // Course Students
    Route::get('courses/{id}/students', [CourseController::class, 'students'])->name('courses.students');

    // Lessons Group
    Route::apiResource('courses.lessons', LessonController::class)
        ->only(['index', 'show'])
        ->parameters(['courses' => 'course_id', 'lessons' => 'id']);

    // Section Group
    Route::apiResource('courses.lessons.sections', SectionController::class)
        ->only(['index', 'show'])
        ->parameters(['courses' => 'course_id', 'lessons' => 'lesson_id', 'sections' => 'id']);

    // Assignment Group
    Route::apiResource('courses.lessons.sections.assignments', AssignmentController::class)
        ->only(['index', 'show'])
        ->parameters(['courses' => 'course_id', 'lessons' => 'lesson_id', 'sections' => 'section_id', 'assignments' => 'id']);

    //Enrollment Group
    Route::apiResource('enrollments', EnrollmentController::class)
        ->only(['index', 'show', 'store']);

    // Submissions
    Route::apiResource('enrollments.assignments.submissions', SubmissionController::class)
        ->only(['index', 'show', 'store'])
        ->parameters(['enrollments' => 'enrollment_id', 'assignments' => 'assignment_id', 'submissions' => 'id']);

    //Submission Grade  Group
    Route::apiResource('submission-grades', SubmissionGradeController::class)
        ->only(['index', 'show']);

    //FrindRequest Group
    Route::apiResource('friend-requests', FrindRequestController::class)
        ->only(['index', 'show', 'store', 'update', 'destroy']);

    //UserBlock Group
    Route::apiResource('user-blocks', UserBlockController::class)
        ->only(['index', 'show', 'store', 'update', 'destroy']);

    //UserFrind Group
    Route::apiResource('user-friends', UserFrindController::class)
        ->only(['index', 'show', 'store', 'update', 'destroy']);

    //Guradian Group

    Route::apiResource('guardians', GuardianController::class)->only(['show']);

    //user pdate profile
    Route::put('update-profile', [UserController::class, 'updateProfile'])->name('profile.update');

    //user delete profile
    Route::delete('delete-profile', [UserController::class, 'deleteProfile'])->name('profile.delete');

    // Boards
    Route::get('boards/{id}', [BoardController::class, 'show'])->name('boards.show');

    // Board List Group
    Route::apiResource('boards.lists', BoardListController::class)
        ->only(['show'])
        ->parameters(['boards' => 'board_id', 'lists' => 'id']);

    // Post Group
    Route::apiResource('boards.lists.posts', PostController::class)
        ->only(['index', 'show' , 'store' , 'update' , 'destroy'])
        ->parameters(['boards' => 'board_id', 'lists' => 'list_id', 'posts' => 'id']);

    // Comment Group
    Route::apiResource('boards.lists.posts.comments', BoardCommentController::class)
        ->parameters(['boards' => 'board_id', 'lists' => 'list_id', 'posts' => 'post_id', 'comments' => 'id']);

    // Teacher Comment Group
    Route::apiResource('submissions.teacher-comments', TeacherCommentController::class)
        ->only(['index', 'show' , 'store' , 'update' , 'destroy'])
        ->parameters(['submissions' => 'submission_id', 'comments' => 'id']);
});
