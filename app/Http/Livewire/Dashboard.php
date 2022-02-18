<?php

namespace App\Http\Livewire;

use App\Models\Team;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\Macros\ViewMacros;

class Dashboard extends Component
{
    public $team;

    public function mount(Team $currentTeam)
    {
        // $array = range(1, 30);

        // $newArray = [];

        // foreach ($array as $key => $value) {
        //     $newArray[$key] = range(1, 2);
        // };

        $this->team = $currentTeam;
    }

    protected function getProjectsProperty()
    {
        return $this->team->projects()->paginate();
    }

    private function formatProjectTimeline(Collection $projects)
    {
        if (!$projects->count()) return [];

        return $projects->map(function ($project, $key) {
            return [
                'x' => $project->name,
                'y' => [
                    $project->started_at->format('Uv'),
                    $project->ended_at->format('Uv'),
                ],
                'url' => route('team.project.edit', [
                    'team' => $this->team->uuid,
                    'project' => $project->uuid,
                ]),
            ];
        });
    }

    protected function renderData()
    {
        return  [
            'projects' => $projects = $this->getProjectsProperty(),
            'timeline' => $this->formatProjectTimeline(collect($projects->items()))
        ];
    }

    public function render()
    {
        /** @var ViewMacros $view */
        $view = view('livewire.dashboard', $this->renderData());
        return $view->layoutData(['team' => $this->team]);
    }
}
