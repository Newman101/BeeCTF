<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Announcements;

class AnnouncementsTest extends TestCase 
{
	use RefreshDatabase;

	public function testIndex()
	{
		$response = $this->get('announcements');
		$response->assertStatus(200);
	}

	public function testIndexAdmin()
	{
		$response = $this->get('admin/announcements');
		$response->assertStatus(200);
	}

	public function testCreate()
	{
		$response = $this->get('admin/announcements/create');
		$response->assertStatus(200);
	}

	public function testStore()
	{
		$data = [
			'inputTitle' => 'Test Announcement',
			'inputContent' => 'th1s_1s_4_t3st'
		];

		$response = $this->post('admin/announcements/create', $data);
		$response->assertStatus(302);
	}

	public function testEdit()
	{
		factory(\App\Announcement::class)->create([
	        'title' => 'Test Title',
    	    'content' => 'This is a test announcement'
		]);

		$response = $this->get('admin/announcements/1/edit');
		$response->assertStatus(200);
	}

	public function testUpdate()
	{
		factory(\App\Announcement::class)->create([
	        'title' => 'Test Title',
    	    'content' => 'This is a test announcement'
		]);

		$data = [
			'inputTitle' => 'Another Test Title',
			'inputContent' => 'Another test announcement'
		];

		$response = $this->post('admin/announcements/1/update', $data);
		$response->assertStatus(302);
	}

	public function testDestroy()
	{
		factory(\App\Announcement::class)->create([
	        'title' => 'Test Title',
    	    'content' => 'This is a test announcement'
		]);

		$response = $this->get('admin/announcements/1/delete');
		$response->assertStatus(302);
	}
}