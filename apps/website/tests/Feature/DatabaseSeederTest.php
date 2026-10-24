<?php

use App\Models\Event;
use App\Models\Project;
use App\Models\Resource;
use App\Models\Submission;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('seeds realistic programming data with expected volume and relations', function () {
    $this->seed(DatabaseSeeder::class);

    // Admin exists
    expect(User::where('email', 'admin@progresshub.com')->where('role', 'admin')->exists())->toBeTrue();

    // At least 25 members
    expect(User::where('role', 'member')->count())->toBeGreaterThanOrEqual(25);

    // Around 25 approved items per entity
    expect(Event::where('approval_status', 'approved')->count())->toBe(25);
    expect(Project::where('approval_status', 'approved')->count())->toBe(25);
    expect(Resource::where('approval_status', 'approved')->count())->toBe(25);

    // Submissions seeded with all statuses
    expect(Submission::count())->toBeGreaterThanOrEqual(25);
    expect(Submission::where('status', 'pending')->count())->toBeGreaterThan(0);
    expect(Submission::where('status', 'approved')->count())->toBeGreaterThan(0);
    expect(Submission::where('status', 'rejected')->count())->toBeGreaterThan(0);

    // Polymorphic relationships resolve correctly
    $submissions = Submission::with(['user', 'submittable'])->get();
    foreach ($submissions as $submission) {
        expect($submission->user)->not->toBeNull();
        expect($submission->submittable)->not->toBeNull();
        expect($submission->submittable->title)->toBeString();
    }
});
