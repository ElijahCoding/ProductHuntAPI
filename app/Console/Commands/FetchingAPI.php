<?php

namespace App\Console\Commands;

use Artisan;
use App\User;
use App\Post;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class FetchingAPI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:seeding';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetching all posts from JsonPlaceholder';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    protected $client;

    public function __construct(Client $client)
    {
        parent::__construct();
        $this->client = $client;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

      $refresh = Artisan::call('migrate:refresh');

      $users = $this->fetchUsers();

      foreach ($users as $user) {
        User::create([
          'name' => $user->name,
          'email' => $user->email
        ]);
      }

      $posts = $this->fetchPosts();

      foreach ($posts as $post) {
        Post::create([
          'user_id' => $post->userId,
          'title' => $post->title,
          'body' => $post->body
        ]);
      }

      $this->info('API seeding finished.');
    }

    protected function fetchUsers()
    {
      $response = $this->client->request('GET', 'https://jsonplaceholder.typicode.com/users');

      return json_decode($response->getBody());
    }

    protected function fetchPosts()
    {
      $response = $this->client->request('GET', 'https://jsonplaceholder.typicode.com/posts');

      return json_decode($response->getBody());
    }


}
