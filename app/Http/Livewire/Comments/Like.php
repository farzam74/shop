<?php

namespace App\Http\Livewire\Comments;

use App\Models\Dislike;
use Livewire\Component;

class Like extends Component

{

    public $likeCount;
    public $dislikeCount;
    public $comment;

    protected $listeners=[
        'updateLikes'
    ];

    //check if user has liked this comment before

    public function like()
    {
        $result=$this->comment->likes->where('user_id','=',auth()->id())->first();
        if ($result != null)
        {
            $this->alert('danger','شما قبلا این کامنت را لایک کرده اید.', [
                'position' =>  'top',
                'timer' =>  3000,
            ]);
        }
        else{
           \App\Models\Like::query()->create(['comment_id' => $this->comment->id,
                'user_id' => auth()->id()]);

        }
        $this->emit('updateLikes');
    }


    public function dislike()
    {
        $result=$this->comment->dislikes->where('user_id','=',auth()->id())->first();

        if ($result != null)
        {
            $this->alert('danger','شما قبلا این کامنت را دیسلایک کرده اید.', [
                'position' =>  'top',
                'timer' =>  3000,
            ]);
        }

        else {
            Dislike::query()->create(['comment_id' => $this->comment->id,
                'user_id' => auth()->id()]);


        }

        $this->emit('updateLikes');

    }


    public function updateLikes()
    {
        $this->likeCount=count($this->comment->likes);
        $this->dislikeCount=count($this->comment->dislikes);
    }

    public function render()
    {
        return view('livewire.comments.like');
    }
}
