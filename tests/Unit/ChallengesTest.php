<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChallengesTest extends TestCase
{
	public function testAdminChallengesVisible()
	{
		$admin = factory(\App\User::class)
			->states('admin')
			->create();
		
		$response = $this->actingAs($admin)->get('/admin');
		$response->assertSee('Manage Challenges');
	}
}
