
?php

use  Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\Admin\{
    AssignmentController,
    AssignmentTypeController,
    BoardCommentController,
    PostController,
    CityController,
    CourseController,
    NotificationController,
    UserController,
    RoleController,
    StateController,
    CountryController,
    SettingController,
    PermissionController,
    GuardianController,
    StudentController,
    GradeController,
    UserFrindController,
    UserBlockController,
    FrindRequestController,
    ReportReasonController,
    ReportController,
    EduLevelController,
    EduYearController,
    SubjectController,
    TeacherController,
    EnrollmentController,
    SubmissionGradeController,
    SubmissionController,
    BoardStyleController,
    BoardController,
    BoardListController,
    TeacherCommentController,
    SectionController,
    LessonController
};

// Route Middleware
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    // User Group
    Route::apiResource('users', UserController::class)->middleware('permissions:users');

    // user getaccess token
    Route::get('users/get-access-token/{id}', [UserController::class, 'getAccessToken'])->middleware('permission:users,GetAccessToken');

    // Country Group
    Route::apiResource("countries", CountryController::class)->middleware("permissions:countries");

    // State Group
    Route::apiResource("countries/{country_id}/states", StateController::class)
        ->middleware("permissions:states")
        ->parameters(["country" => "country_id", "states" => "id"]);

    // City Group
    Route::apiResource('countries.states.cities', CityController::class)
        ->parameters(['country' => 'country_id', 'state' => 'state_id', 'cities' => 'id'])
        ->middleware('permissions:cities');

    // Setting Group
    Route::apiResource('settings', SettingController::class)
        ->only(['index', 'update'])
        ->parameter('settings', 'id');

    // Roles group
    Route::apiResource('roles', RoleController::class)->middleware('permissions:roles');

    // Permissions Group
    Route::apiResource('roles.permissions', PermissionController::class)
        ->only(['index', 'show'])
        ->parameters(['roles' => 'role_id', 'permissions' => 'id'])
        ->middleware('permissions');

    // Notification Group
    Route::apiResource('notifications', NotificationController::class)
        ->except('store')
        ->middleware('permissions:notifications');

    Route::post('notifications/mark-all-as-read', [NotificationController::class, 'markAllAsRead'])
        ->middleware('permissions:notifications');

    //Route Guardian
    Route::apiResource('guardians', GuardianController::class)
        ->only(['store', 'approve', 'update', 'destroy'])
        ->middleware('permissions:guardians');

    //Route Student
    Route::apiResource('students', StudentController::class)
        ->only(['store', 'update', 'destroy'])
        ->middleware('permissions:students');

    //Route Grade
    Route::apiResource('grades', GradeController::class)->middleware('permissions:grades');

    //Route UserFriend
    Route::apiResource('user-friends', UserFrindController::class)->middleware('permissions:user-friends');

    //Route UserBlock
    Route::apiResource('user-blocks', UserBlockController::class)->middleware('permissions:user-blocks');

    //Route FriendRequest
    Route::apiResource('friend-requests', FrindRequestController::class)->middleware('permissions:friend-requests');

    //Route ReportReason
    Route::apiResource('report-reasons', ReportReasonController::class)->middleware('permissions:report-reasons');

    //Route Report
    Route::apiResource('reports', ReportController::class)->middleware('permissions:reports');

    //Route EduLevel
    Route::apiResource('edu-levels', EduLevelController::class)->middleware('permissions:edu-levels');

    //Route EduYear
    Route::apiResource('edu-years', EduYearController::class)->middleware('permissions:edu-years');

    //Route EduYear
    Route::put('edu-years/{id}/add-subjects', [EduYearController::class, 'addSubject'])->middleware('permission:edu-years,update');
    Route::put('edu-years/{id}/delete-subjects', [EduYearController::class, 'removeSubject'])->middleware('permission:edu-years,update');


    //Route Subject
    Route::apiResource('subjects', SubjectController::class)->middleware('permissions:subjects');


    // Course Group
    Route::apiResource('courses', CourseController::class)->middleware('permissions:courses');
    //teachers
    Route::apiResource('teachers', TeacherController::class)
        ->only(['store', 'approve', 'update', 'destroy', 'index', 'show'])
        ->middleware('permissions:teachers');

    Route::apiResource('teachers', TeacherController::class)->middleware('permissions:teachers');

    //Enrollments
    Route::apiResource('enrollments', EnrollmentController::class)->middleware('permissions:enrollments');

    Route::apiResource('courses.lessons', LessonController::class)
        ->middleware('permissions:lessons')
        ->parameters(['courses' => 'course_id', 'lessons' => 'id']);

    //Section
    Route::apiResource('courses.lessons.sections', SectionController::class)
        ->middleware('permissions:sections')
        ->parameters(['courses' => 'course_id', 'lessons' => 'lesson_id', 'sections' => 'id']);

    //Assignment
    Route::apiResource('courses.lessons.sections.assignments', AssignmentController::class)
        ->middleware('permissions:assignments')
        ->parameters(['courses' => 'course_id', 'lessons' => 'lesson_id', 'sections' => 'section_id', 'assignments' => 'id']);

    // Submissions
    Route::apiResource('enrollments.assignments.submissions', SubmissionController::class)
        ->only(['index', 'show', 'destroy'])
        ->middleware('permissions:submissions')
        ->parameters(['enrollments' => 'enrollment_id', 'assignments' => 'assignment_id', 'submissions' => 'id']);

    //AssignmentType
    Route::apiResource('assignment-types', AssignmentTypeController::class)->middleware('permissions:assignment-types');

    //Board
    Route::apiResource('boards', BoardController::class)->middleware('permissions:boards');

    //SubmissionGrade
    Route::apiResource('submission-grades', SubmissionGradeController::class)->middleware('permissions:submission-grades');

    //BoardStyle
    Route::apiResource('board-styles', BoardStyleController::class)->middleware('permissions:board-styles');


    //lists
    Route::apiResource('boards.lists', BoardListController::class)
        ->middleware('permissions:lists')
        ->parameters(['boards' => 'board_id', 'lists' => 'id']);

    // Post Group
    Route::apiResource('boards.lists.posts', PostController::class)
        ->middleware('permissions:posts')
        ->parameters(['boards' => 'board_id', 'lists' => 'list_id', 'posts' => 'id']);

    // Comment Group
    Route::apiResource('boards.lists.posts.comments', BoardCommentController::class)
        ->middleware('permissions:comments')
        ->parameters(['boards' => 'board_id', 'lists' => 'list_id', 'posts' => 'post_id', 'comments' => 'id']);
    // TeacherCommentController Group
    Route::apiResource('submissions.teacher-comments', TeacherCommentController::class)
        ->middleware('permissions:teacher-comments')
        ->parameters(['submissions' => 'submission_id', 'comments' => 'id']);

    Route::get('courses/{course_id}/students', [CourseController::class, 'students'])
        ->middleware('permission:courses,GetStudents');
});
