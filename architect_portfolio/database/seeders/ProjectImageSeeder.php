<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProjectImageSeeder extends Seeder
{
    /**
     * Run the database seeds
     */
    public function run(): void
    {
        $projectImages = [
            'Bytový dům Žižkova v České Kamenici' => 'dum-kamenice',
            'Organizace architektonické soutěže pro město Humpolec' => 'archi-soutez-humpolec',
            'Náměstí Almy Rosé v Jihlavě' => 'namesti-jihlava',
            'Kuchyň v rodinném domě' => 'kuchyne',
            'Plácek s vodním prvkem v České Kamenici' => 'placek-kamenice',
            'Interiér dětské skupiny' => 'detska-skupina-kamenice',
            'Náměstí s městským hradem ve Stropkově'=> 'namesti-stropkov',
            'Náměstí J. A. Alise v Příbrami'=> 'namesti-pribram',
            'Revitalizace vnitrobloku Divadla Jiřího Myrona v Ostravě'=> 'vnitroblock-ostrava',
            'Revitalizace Bechyňova náměstí v Přibyslavi'=> 'namesti-pribyslav',
            'Návrh pomníku a úpravy náměstí Interbrigády v Praze'=> 'pomnik-praha',
            'Rekonstrukce Masarykova náměstí v Uherském Hradišti'=> 'rekonstrukce-namesti-uherske-hradiste',
            'Hasičská zbrojnice v Lanškrouně'=> 'zbrojnice-lanskroun',
            'Revitalizace lokality bývalých jezdeckých kasáren v Prostějově'=> 'kasarna-prostejov',
            'Náměstí v Tuchlovicích'=> 'namesti-tuchlovice',
            'Zahuštění zástavby za kostelem sv. Mikuláše ve Velkém Meziříčí'=> 'kostel-velke-mezirici',
            'Stará Hasička v Brně'=> 'hasicka-brno',
            'Římskokatolický kostel v Praze - Holešovicích'=> 'kostel-praha',

        ];

        foreach ($projectImages as $projectTitle => $imageFolder) {
            $project = Project::where('title', $projectTitle)->first();

            if ($project) {
                $images = glob(storage_path("app/public/images/{$imageFolder}/img/*"));

                foreach ($images as $imagePath) {
                    ProjectImage::create([
                        'project_id' => $project->id,
                        'image_path' => str_replace(storage_path('app/public/'), '', $imagePath),
                    ]);
                }
            }
        }
    }
}
