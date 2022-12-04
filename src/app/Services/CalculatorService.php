<?php

namespace App\Services;

use App\Models\Developer;
use App\Models\Task;

/**
 * @SuppressWarnings(PHPMD.UnusedLocalVariable)
 */
class CalculatorService
{
    private array $tasks;
    private array $developers;
    private array $schedules;
    private array $wastedTasks;

    public function __construct()
    {
        /*
         *  Model::all methodunu kullanmak belli şartlarda verimsiz olabilir. Bu proje için tam anlamıyla geçerli değildir.
         *  Model::cursor() fonksiyonu kullanılarak tüm veritabanı kayıtları döngü içinde gezilir ve her bir kaydın işlenmesi sağlanır.
         *  Bu sayede, tüm veriler aynı anda bellekte tutulmaz ve büyük veritabanları için daha verimli bir yöntem kullanılmış olur.
         */
        $this->tasks = Task::all()->toArray();
        $this->developers = Developer::all()->toArray();
        $this->wastedTasks = array();

        // İşleri sıralayalım (zorluk derecesine göre) gerekli değil sıralamış olmak için sıraladım
        usort($this->tasks, function ($firstTask, $secondTask) {
            return $firstTask['level'] <=> $secondTask['level'];
        });
    }

    public function run(): self
    {
        // İşleri bir döngü ile gez
        foreach ($this->tasks as $task) {
            // İşin zorluk derecesini bulalım
            $level = $task['level'];

            // İşi yapabilecek en uygun developer'ı bulalım
            $developer = null;
            foreach ($this->developers as $candidate) {
                if ($candidate['level'] >= $level && $candidate['capacity'] > 0) {
                    if (!$developer || $candidate['level'] < $developer['level']) {
                        $developer = $candidate;
                    }
                }
            }

            // İşi yapacak developer'ı bulamadıysak
            if (!$developer) {
                // İşi yapacak geliştirici bulamadık.
                $this->wastedTasks[] = $task;
                continue;
            }

            // Developer'ın çalışma kapasitesini güncelleyelim
            $developer['capacity'] -= $task['estimated_duration'];

            // Developer'ın iş listesine ekleyelim
            $this->schedules[$developer['name']][] = $task;
        }
        return $this;
    }

    public function calculateWorkingPlan(): array
    {
        // İşlerin tamamlanma süresini hesaplayalım
        $weeks = 0;
        $remaining = 0;
        foreach ($this->schedules as $developer => $tasks) {
            $hours = array_reduce($tasks, function ($hours, $task) {
                return $hours + $task['estimated_duration'];
            }, 0);

            // İşlerin tamamlanma süresini haftalara bölelim
            $weeks += floor($hours / 45);

            // Kalan saatleri hesaplayalım
            $remaining += $hours % 45;
        }

        // Kalan saatler 45 saatten büyükse haftaları arttır
        if ($remaining > 45) {
            $weeks += floor($remaining / 45);
            $remaining = $remaining % 45;
        }
        return [
            'weeks' => $weeks,
            'hours' => $remaining
        ];
    }

    /**
     * @return array
     */
    public function getSchedules(): array
    {
        return $this->schedules;
    }

    /**
     * @return array
     */
    public function getWastedTasks(): array
    {
        return $this->wastedTasks;
    }
}
