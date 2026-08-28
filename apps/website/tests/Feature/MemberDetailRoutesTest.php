<?php

use App\Models\Event;
use App\Models\Project;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create([
        'role' => 'member',
    ]);
});

describe('Member Events Detail Route', function () {
    it('redirects guests to login page', function () {
        $response = $this->get(route('members.events.detail'));

        $response->assertRedirect(route('login'));
    });

    it('redirects to events index if no events exist', function () {
        $response = $this->actingAs($this->user)->get(route('members.events.detail'));

        $response->assertRedirect(route('members.events.index'));
    });

    it('redirects to event show page when event exists', function () {
        $event = Event::create([
            'title' => 'Sample Event',
            'created_by' => $this->user->id,
        ]);

        $response = $this->actingAs($this->user)->get(route('members.events.detail'));

        $response->assertRedirect(route('members.events.show', $event));
    });
});

describe('Member Projects Detail Route', function () {
    it('redirects guests to login page', function () {
        $response = $this->get(route('members.projects.detail'));

        $response->assertRedirect(route('login'));
    });

    it('redirects to projects index if no projects exist', function () {
        $response = $this->actingAs($this->user)->get(route('members.projects.detail'));

        $response->assertRedirect(route('members.projects.index'));
    });

    it('redirects to project show page when project exists', function () {
        $project = Project::create([
            'title' => 'Sample Project',
            'created_by' => $this->user->id,
        ]);

        $response = $this->actingAs($this->user)->get(route('members.projects.detail'));

        $response->assertRedirect(route('members.projects.show', $project));
    });
});

describe('Member Resources Detail Route', function () {
    it('redirects guests to login page', function () {
        $response = $this->get(route('members.resources.detail'));

        $response->assertRedirect(route('login'));
    });

    it('redirects to resources index if no resources exist', function () {
        $response = $this->actingAs($this->user)->get(route('members.resources.detail'));

        $response->assertRedirect(route('members.resources.index'));
    });

    it('redirects to resource show page when resource exists', function () {
        $resource = Resource::create([
            'title' => 'Sample Resource',
            'created_by' => $this->user->id,
        ]);

        $response = $this->actingAs($this->user)->get(route('members.resources.detail'));

        $response->assertRedirect(route('members.resources.show', $resource));
    });
});

describe('Admin Dashboard Route', function () {
    it('allows admin access to dashboard', function () {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $response = $this->actingAs($admin)->get(route('admin.index'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.index');
    });

    it('redirects member users attempting to access admin dashboard', function () {
        $response = $this->actingAs($this->user)->get(route('admin.index'));

        $response->assertRedirect(route('members.dashboard'));
    });
});
