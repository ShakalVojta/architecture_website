<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Support\Facades\File;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Bytový dům Žižkova v České Kamenici',
                'full_title' => 'Bytový dům Žižkova 553',
                'location' => 'Česká Kamenice',
                'author' => 'Ing. arch. Anna Laubová',
                'phase' => 'studie',
                'project_type' => 'novostavba',
                'date' => '2024-01-01',
                'annotation' => '',
                'description' => '
                      ROZVOJ LOKALITY
                      Vznik veřejné cesty vedoucí na východě řešeného pozemku. Propojka s nezpevněným povrchem mezi ploty dvou pozemků. Přesunutí stavby technického vybavení a výstavba další bytové stavby na pozemcích města (možné pouze při změně územího plánu).

                      ARCHETYP DOMU
                      Zděný dům se sedlovou střechou. Respektování okolní zástavby. Moderní pojetí archetypu vesnického domu. Okenní otvory ve hmotě domu. Současné pojetí bosáže. Bílá omítka v kombinaci s šedou plechovou krytinou.

                      ZELEŇ VE MĚSTĚ
                      Doplnění zeleného pásu města. Zachování prosperujících dřevin na pozemku. Doplnění vhodných a domácích listnatých dřevin (ovocné stromy, javory, lípy). Záhonky pro obyvatele domů. Doplnění drobného mobiliáře (lavičky a stojan na kola). Komplexní koncept nakládání s dešťovými vodami (sběr ze zpevněných ploch a střech, vsak a akumulace). Akumulační nádrž a znovuvyužítí vody (zálivka, kropení ulic v letních měsících, čištění povrchů).

                      ENERGETICKÁ EFEKTIVITA
                      Čerpadlo vzduch - voda. Podlahové vytápění v přízemí. Fotovoltaické panely pro získání elektrické energie a ohřev vody. Rekuperace.',
                'cover_image' => 'storage/app/public/images/dum-kamenice/uvodka.jpg',
                'images_folder' => 'storage/app/public/images/dum-kamenice/img'
            ],
            [
                'title' => 'Organizace architektonické soutěže pro město Humpolec',
                'full_title' => 'Organizace architektonické soutěže "Spolkový dům Husova"',
                'location' => 'Humpolec',
                'author' => 'Ing. arch. Anna Laubová',
                'phase' => '',
                'date' => '2023-03-01',
                'project_type' => 'soutěž',
                'annotation' => '',
                'description' => '
                    1. konzultace se zadavatelem nad smyslem a účelem soutěže
                    2. výběr vhodného charakteru architektonické soutěže
                    3. definice a sestavení soutěžního zadání
                    4. doporučení členů poroty a přizvaných odborníků
                    5. zajištění pomocných orgánů soutěže (sekretáře a přezkušovatele)
                    6. sestavení soutěžních podmínek a jejich předložení ČKA
                    7. doporučení a zajištění dalších nezbytných podkladů (fotografie, zaměření apod.)
                    8. svolání a vedení ustavující schůze poroty
                    9. zajištění získání regulérnosti od ČKA
                    10. pomoc při vyhlášení soutěže
                    11. vysvětlení dotazů podaných účastníky soutěže
                    12. zajištění prohlídek soutěžního místa
                    13. kontrola a přezkoušení návrhů
                    14. příprava na hodnotící zasedání poroty
                    15. účast při hodnocení soutěžních návrhů
                    16. pomoc při vyhlášení výsledků soutěže
                    17. tvorba katalogu a obsahu výstavy soutěžních návrhů',
                'cover_image' => 'storage/app/public/images/archi-soutez-humpolec/uvodka.jpg',
                'images_folder' => 'storage/app/public/images/archi-soutez-humpolec/img'
            ],
            [
                'title' => 'Náměstí Almy Rosé v Jihlavě',
                'full_title' => 'Revitalizace náměstí Almy Rosé',
                'location' => 'Jihlava',
                'author' => 'Ing. arch. Anna Laubová, Ing. arch. Vojtěch Sosna',
                'phase' => null,
                'rating' => 'sdílené 2. místo (1. místo nebylo uděleno)',
                'project_type' => 'veřejný prostor',
                'annotation' => '
                        Konceptem je vytvoření nového lokálního centra, podpoření pěší prostupnosti a cyklistické dopravy, důstojné navázání na městskou památkovou zónu s důrazem na tradiční a odolné materiály.
                        Cílem je vytvořit náměstí pro občany Jihlavy i turisty, pro děti a mládež docházející do okolních škol, pro rodiče s dětmi objevující možnosti umělecké instalace, pro seniory odpočívající ve stínu vysázených stromů, pro nakupující v obchodním domě i na trzích, pro strávníky na zahrádkách restaurací.',
                'date' => '2022-03-01',
                'cover_image' => 'storage/app/public/images/namesti-jihlava/uvodka.jpg',
                'images_folder' => 'storage/app/public/images/namesti-jihlava/img'
            ],
            [
                'title' => 'Kuchyň v rodinném domě',
                'full_title' => 'Kuchyň v rodinném domě',
                'location' => '',
                'author' => 'Ing. arch. Anna Laubová',
                'project_type' => 'interiér',
                'annotation' => 'Kuchyňská linka z přelomu tisíciletí byla po více než 20 letech zralá na výměnu. Investor souhlasil s celkovou rekonstrukcí kuchyňského koutu a reorganizací přilehlé jídelny a obývacího pokoje. V rámci stavebních prací byl odstraněn obklad za linkou a dlažba. Ta byla nahrazena novou, ladící s podlahou obývacího pokoje. Vedení elektroinstalací, nové zásuvky, vypínače a osvětlení bylo součástí návrhu. Novou kuchyňskou linku světlé smetanové barvy v kombinaci s dubovou překližkou doplňují prvky z broušené nerezi. Všechny vybrané spotřebiče byly podrobeny poctivé konzultaci a na míru vyrobená kuchyně splňuje požadavek dostatku úložného prostoru.',
                'proposal' => 'srpen 2023',
                'implementation' => 'leden 2024',
                'date' => null,
                'cover_image' => 'storage/app/public/images/kuchyne/uvodka.jpg',
                'images_folder' => 'storage/app/public/images/kuchyne/img'
            ],
            [
                'title' => 'Plácek s vodním prvkem v České Kamenici',
                'full_title' => 'Nový vodní prvek a úprava plácku',
                'location' => 'Česká Kamenice',
                'author' => 'Ing. arch. Anna Laubová',
                'phase' => 'dokumentace pro provedení stavby',
                'rating' => null,
                'project_type' => 'veřejný prostor',
                'annotation' => '
                        Řešená lokalita se nachází ve městě Česká Kamenice na křížení ulic Nerudova a U Kaple. Jedná se o malý plácek, který dříve neměl žádné využití a byl pokryt travnatou plochou a několika neprosperujícími dřevinami. Po revitalizaci vznikne nový prostor pro zastavení v těsné blízkosti na dům s obnoveným orlojem.
                        Důraz je kladen na použití tradičních a odolných materiálů. Pochozí povrchy jsou převážně z žuly, kombinují se různé velikosti, dva odstíny a rozdílné vazby dlažby. Kamenná zídka je pískovcová a nový vodní prvek z jednoho kusu čediče. Větší pobytovost prostoru podpoří tři lípy srdčité a dva druhy laviček. Terénní nerovnosti vyrovnávají žulové stupně směrem do ulice Nerudova.
                        Vybraný materiál je v dané oblasti velmi lokální. Čedič je hornina s bohatým výskytem v Českém Středohoří, nedaleké Doupovské hory jsou tvořeny pouze z něj. Nejvýraznější referencí je však Panská skála u obce Kamenický Šenov, vzdálená pouze osm kilometrů od České Kamenice. Konkrétní kus kamene na výrobu kašny bude z aktivního lomu Dubičná, který je od města vzdálen 25 km směrem na jih. Kámen tmavě šedé barvy přirozeně vytváří pěti či šestiboké hranoly, které v případě tohoto lomu dosahují šířky až 150 cm. Kašna tedy bude vytvořena z jednoho kusu kamene. Z bočních stran zůstane kámen v přirozené neopracované podobě do výšky asi 90 cm. Jeho horní hrana bude dokonale seříznutá a vyleštěná, stejně jako prohlubeň na vodu ve tvaru půlkoule. Tento hladký povrch bude v kontrastu s hrubým vnějškem kašny. Do kašny bude přiváděna voda kovovou tyčí uprostřed, voda se bude pravidelně obměňovat, čistit a dezinfikovat. Středem kamene bude kašna napojena na strojovnu. Kámen bude osazen v betonovém základu.
                        Umístění vodního prvku při hraně náměstí respektuje středověké zásady, kdy byly kašny na náměstí a tržiště umísťovány asymetricky, obvykle na nárožích. Toto umístění není výsledkem rigidní geometrie, ale otázkou citu a snahou o vytvoření příjemného pobytového prostředí pro obyvatele města i jeho návštěvníky.',
                'scope_of_work' => null,
                'date' => '2023-08-01',
                'cover_image' => 'storage/app/public/images/placek-kamenice/uvodka.jpg',
                'images_folder' => 'storage/app/public/images/placek-kamenice/img'
            ],
            [
                'title' => 'Interiér dětské skupiny',
                'full_title' => 'Interiér dětské skupiny',
                'location' => 'Česká Kamenice',
                'author' => 'Ing. arch. Anna Laubová',
                'phase' => 'studie',
                'rating' => null,
                'project_type' => 'interiér',
                'annotation' => '',
                'description' => '
                        SVĚTLOST A BAREVNOST
                        Pro interiér dětské skupiny byla zvolena kombinace prvků, která zdůrazňuje světlost, přírodní atmosféru a hravost prostředí. Pás oken směřující k terase a střešní světlíky přinášejí do prostoru hojnost přirozeného světla. Vestavěný i volný nábytek z březového dřeva dodává interiéru příjemnou texturu a vzhled spojený s přírodou. Žlutá barva pak prostředí oživuje energií, radostí a pozitivní atmosférou, podporuje kreativitu a zdravý rozvoj dětského potenciálu. Tato harmonická kombinace prvků vytváří prostředí, které je jak inspirativní, tak i přátelské k dětskému učení a rozvoji.

                        VARIABILITA A PROSTORNOST
                        Zásadním pravidlem návrhu je umísťování vestavěného nábytku, stěnového systému a pobytového schodiště s úložným prostorem, pouze po stranách třídy. Tento koncept umožňuje snadné odstranění všech ostatních prvků, jako jsou stolky, židle a posuvné komody. Při otevření posuvné stěny mezi oběma třídami se vytvoří velký prostor pro 48 dětí, což umožňuje flexibilitu v uspořádání prostoru podle aktuálních potřeb a aktivit. Tato variabilita prostoru poskytuje prostředí, které podporuje spolupráci, sociální interakce a různorodé učební a hrací aktivity dětí.

                        KRUH JAKO ZÁKLADNÍ TVAR
                        V návrhu interiéru hraje klíčovou roli použití kruhu jako základního tvarového prvku. Inspirací byly velké kruhové okenní otvory jak z exteriéru, tak i v interiéru. Další kruhové otvory jsou umístěny ve výšce očí dětí také ve dveřích. Kruhové tvary se objevují i u stolů, vestavěného nábytku a jeho detailů, což dodává prostoru organický a přirozený vzhled. Dále jsou zde kruhová zrcadla, herní prvky na stěnách, kulovitá svítidla, válcovité sedací vaky a podsedáky. Tato kombinace detailů vytváří prostor, který nejen působí vizuálně atraktivně, ale také podporuje pohodlí a příjemnou atmosféru pro uživatele.

                        ROSTLINY VE VÝUCE
                        V třídě je umístěna dřevěná konstrukce pod světlíkem, na kterou lze umístit květináče s rostlinami nebo výtvarné práce dětí. Pod touto konstrukcí jsou pojízdné boxy určené pro pěstování rostlin, což
                        dětem umožňuje pochopit cyklus života rostlin a aktivně se podílet na jejich růstu a vývoji přímo ve třídě. Vypěstované rostliny pak mohou být součástí jídelníčku dětí. Tato myšlenka pěstování rostlin v
                        interiéru vychází z okolního prostředí budovy. Koncept je možné rozšířit i mimo interiér, na terasu či do zahrady školky, kde děti mohou prohlubovat své znalosti o přírodě a o péči o životní prostředí.',
                'scope_of_work' => null,
                'date' => '2024-04-01',
                'cover_image' => 'storage/app/public/images/detska-skupina-kamenice/uvodka.jpg',
                'images_folder' => 'storage/app/public/images/detska-skupina-kamenice/img'
            ],
            [
                'title' => 'Náměstí s městským hradem ve Stropkově',
                'full_title' => 'Revitalizace náměstí s městským hradem',
                'location' => 'Stropkov (Slovensko)',
                'author' => 'Ing. arch. Anna Laubová, Ing. arch. Vojtěch Sosna',
                'rating' => '3. místo',
                'project_type' => 'veřejný prostor',
                'annotation' => '
                    Řešené území tvoří centrální prostor města Stropkov, v blízkém kontaktu z již zrevitalizovanou části na severu. Na tuto část, která má charakter volné dlážděné plochy, plynule navazuje a doplňuje centrum města o zeleň s důrazem na historický odkaz města. Návrh nemění podstatu již upravené části náměstí. Kostel, zámeček i pozůstatky významného hradu jsou zdůrazněny a nově plně vyznívá jejich hodnota. Návrh pracuje se stávající zelení v území a počítá s vhodným doplněním vegetace a úpravou veřejného prostranství.',
                'date' => '2023-05-01',
                'cover_image' => 'storage/app/public/images/namesti-stropkov/uvodka.jpg',
                'images_folder' => 'storage/app/public/images/namesti-stropkov/img'
            ],
            [
                'title' => 'Náměstí J. A. Alise v Příbrami',
                'full_title' => 'Revitalizace náměstí J. A. Alise',
                'location' => 'Příbram - Březové Hory',
                'author' => 'Ing. arch. Anna Laubová, Ing. arch. Karel Filsak',
                'rating' => 'mimořádná odměna',
                'project_type' => 'veřejný prostor',
                'annotation' => '
                    Hlavním cílem navržených úprav je navrácení důstojnosti hlavního náměstí Březových Hor, které je přirozeným centrem oblasti. Náměstí bude odpovídat svému významu a bude odkazovat na historický kontext místa, úpravy povedou k navrácení života a obnovení původní funkce. Návrh zdůrazňuje hlavní dominanty – kostel sv. Vojtěcha, sochu sv. J. Nepomuckého a parkovou úpravu náměstí H. Kličky s památníkem.
                    Návrh tvoří nové atmosféry pro různé typy činností. Uvolněný střed náměstí jako těžiště celého prostoru je univerzální pro každodenní činnosti i pořádané akce, vršek za kostelem doplňuje platan a je zde uživatelům nabídnuto posezení a výhled, pobytové místo vzniká také u lípy vysazené v r. 2018, parková úprava prostoru na náměstí H. Kličky vybízí k odpočinku a relaxaci.
                    Návrh počítá s doplněním zástavby v blízkosti kostela s ohledem na historickou stopu. Náměstí bude fungovat i bez doplnění navrhované zástavby, ale pro ideální uzavření náměstí je nezbytná. Navrhovaná zástavba plochou i hmotou reaguje na okolní domy a poskytuje prostor pro zřízení chybějících funkcí v území.',
                'date' => '2022-09-01',
                'cover_image' => 'storage/app/public/images/namesti-pribram/uvodka.jpg',
                'images_folder' => 'storage/app/public/images/namesti-pribram/img'
            ],
            [
                'title' => 'Revitalizace vnitrobloku Divadla Jiřího Myrona v Ostravě',
                'full_title' => 'Revitalizace vnitrobloku Divadla Jiřího Myrona',
                'location' => 'Ostrava',
                'author' => 'Ing. arch. Anna Laubová, Ing. arch. Vojtěch Sosna',
                'rating' => 'odměna',
                'project_type' => 'úprava vnitrobloku a dostavba',
                'annotation' => '
                    Stávající budovy doplňují nové přístavby, které tvarově i materiálově navazují na stavbu divadla od architekta Klimeše z roku 1986. Spojení nových i starých hmot člení prostory vnitrobloku na tři na sebe navazující části. Prostor sevřený mezi stěnami domů je intimní pro trávení času jednotlivce či menší skupiny lidí, centrální prostor ohraničený čtveřicí stromů pro pořádání neformálních akcí a setkávání více lidí a prostor provozní ve funkčním a esteticky upraveném prostředí.',
                'date' => '2023-03-01',
                'cover_image' => 'storage/app/public/images/vnitroblock-ostrava/uvodka.jpg',
                'images_folder' => 'storage/app/public/images/vnitroblock-ostrava/img'
            ],
            [
                'title' => 'Revitalizace Bechyňova náměstí v Přibyslavi',
                'full_title' => 'Bechyňovo náměstí',
                'location' => 'Přibyslav',
                'author' => 'Ing. arch. Anna Laubová, Ing. arch. Karel Filsak',
                'project_type' => 'veřejný prostor',
                'annotation' => '
                    Cílem návrhu je vyzdvihnout památkovou hodnotu města a vytvořit příjemné místo pro obyvatele i návštěvníky. Nejvýraznější změnou je přesunutí vozovky, která dnes vede středem náměstí, nově na místo historicky vedené komunikace. Díky této úpravě dojde k vzniku důstojného a plnohodnotného pobytového prostoru. Dalšími úpravami je rozšíření chodníků, sjednocení povrchů a použití tradičních materiálů, doplnění vhodného mobiliáře, tradičních dřevin, revitalizace parkové části náměstí, vytvoření bezpečného a příjemné prostředí v blízkosti autobusových zastávek či optimalizace dopravní i technické infrastruktury. Výrazným doplněním je přidání vodních prvků a pítek, která podpoří historický odkaz města. Návrh, který k úpravě samotného náměstí přistupuje konzervativně, doplňuje moderní a funkční koncept nakládání se srážkovými vodami.',
                'date' => '2023-11-01',
                'cover_image' => 'storage/app/public/images/namesti-pribyslav/uvodka.jpg',
                'images_folder' => 'storage/app/public/images/namesti-pribyslav/img'
            ],
            [
                'title' => 'Návrh pomníku a úpravy náměstí Interbrigády v Praze',
                'full_title' => 'Pomník Pražského povstání a úpravy náměstí Interbrigády',
                'location' => 'Praha',
                'author' => 'Ing. arch. Anna Laubová, Ing. arch. Karel Filsak',
                'project_type' => 'veřejný prostor',
                'annotation' => '
                        Náměstí Interbrigády, které je součástí zeleného pásu Dejvic, je plocha doplňující obytnou zónu o místo se vzrostlou zelení a s neformálním charakterem. Dnešní poněkud chaotické uspořádání dostane nový řád, neprosperující stromy a keře budou odstraněny a nahrazeny jinými. Prostor kromě zelených ploch nabídne také množství aktivit pro lidi všech věkových kategorií.
                        Významným prvkem náměstí bude nový pomník Pražského povstání. Jeho tvar je založen na jednoduché geometrii tří kruhových sférických ploch, které se o sebe navzájem opírají. Trojice štítů je alegorií odvahy, spojení a hrdosti. Vnější pole místo zdobené interpretace a estetizace heraldických vzorů nesou stopy násilí a bolestivých zásahů.',
                'date' => '2023-09-01',
                'cover_image' => 'storage/app/public/images/pomnik-praha/uvodka.jpg',
                'images_folder' => 'storage/app/public/images/pomnik-praha/img'
            ],
            [
                'title' => 'Rekonstrukce Masarykova náměstí v Uherském Hradišti',
                'full_title' => 'Rekonstrukce Masarykova náměstí',
                'location' => 'Uherské Hradiště',
                'author' => 'Ing. arch. Anna Laubová, Ing. arch. František Laub',
                'project_type' => 'veřejný prostor',
                'annotation' => '
                    Náměstí jako přirozené těžiště pro obyvatele i návštěvníky města. Náměstí pro všechny generace. Uvolnění střed pro pořádání společenských událostí. Okraje náměstí lemováno stromy, těmi starými i novými. Lavičky, pítka, stojany na kola, mlžítka, koše a nové lampy. Kvalitní a tradiční materiály. Bezbariérové a přátelské prostředí. Nenápadné zdůraznění historické stopy na náměstí – kaple, kostel, kryt.',
                'date' => '2023-10-01',
                'cover_image' => 'storage/app/public/images/rekonstrukce-namesti-uherske-hradiste/uvodka.jpg',
                'images_folder' => 'storage/app/public/images/rekonstrukce-namesti-uherske-hradiste/img'
            ],
            [
                'title' => 'Hasičská zbrojnice v Lanškrouně',
                'full_title' => 'Hasičská zbrojnice',
                'location' => 'Lanškroun',
                'author' => 'Ing. arch. Jakub Tomášek, Ing. arch. Anna Laubová, Ing. arch. Vojtěch Sosna',
                'project_type' => 'novostavba',
                'annotation' => '
                    Drobný objekt archetypální hmoty vychází z okolní zástavby a citlivě doplňuje volnou parcelu na okraji historického jádra. Dvoupodlažní objekt se sedlovou střechou o půdorysných rozměrech 25,8 x 16,25 metrů svou bílou barvou zdiva s červenými rámy otvorů pravdivě prozrazuje svůj účel. Jednoduchou hmotu domu zvýrazňuje věž - zvonice umístěná v rohu domu, která slouží pro sušení hadic a umístění signalizace výjezdu a technologie radiokomunikací. Dům je navržen s betonových tepelně izolačně šalovacích tvárnic, které budou natřeny bílou barvu. Sedlová střecha je pokryta plechovou falcovanou krytinou též bílé barvy. Jinak strohou hmotu rytmizují hluboké otvory s výplněmi, které jsou výrazné svou červenou barvou. Nová hasičská zbrojnice poskytuje zázemí pro jednotku požární ochrany a také místní sbor dobrovolných hasičů.',
                'date' => '2022-09-01',
                'cover_image' => 'storage/app/public/images/zbrojnice-lanskroun/uvodka.jpg',
                'images_folder' => 'storage/app/public/images/zbrojnice-lanskroun/img'
            ],
            [
                'title' => 'Revitalizace lokality bývalých jezdeckých kasáren v Prostějově',
                'full_title' => 'Revitalizace lokality bývalých jezdeckých kasáren',
                'location' => 'Prostějov',
                'author' => 'Ing. arch. Anna Laubová, Ing. arch. František Laub',
                'project_type' => 'veřejný prostor',
                'annotation' => 'Kompozice parku je založena na jasně čitelné geometrii, která prostor nenuceně dělí na několik míst s různými charaktery. Centrální část je formálnější, více zpevněná, s pravidelným bosketem a vodním prvkem. Východní část parku tvoří hustý porost, který poskytuje soukromí uživatelům a více možností aktivit. Na jihozápadě území došlo k rozšíření botanické zahrady a vytvoření místa pro hru dětí i dospělých. Z bývalé budovy kasáren je učebna botanické zahrady a tančírna s kavárnou.',
                'date' => '2023-03-01',
                'cover_image' => 'storage/app/public/images/kasarna-prostejov/uvodka.jpg',
                'images_folder' => 'storage/app/public/images/kasarna-prostejov/img'
            ],
            [
                'title' => 'Náměstí v Tuchlovicích',
                'full_title' => 'Revitalizace náměstí',
                'location' => 'Tuchlovice',
                'author' => 'Ing. arch. Anna Laubová, Ing. arch. Vojtěch Sosna',
                'project_type' => 'veřejný prostor',
                'annotation' => '
                    Náměstí jako kultivovaný centrální prostor obce. Nové lokální centrum s preferencí pěší prostupnosti. Navrácení důstojné podoby náměstí jako středu obce Tuchlovice s důrazem na tradiční a odolné materiály. Uvolnění středu náměstí, doplnění vhodných stromů, umístění vodního prvků na konec prodloužené aleje Sváteční cesty, umístění praktického uměleckého prvků k podobě slunečních hodin a podpoření přístupu k Tuchlovickému potoku. Vytvoření místa k setkávání, odpočinku, kulturním a jiným aktivitám. Zjednodušení vazeb a sjednocení povrchů nejen v řešeném území, ale i v ideové části návrhu. Podpora parteru podniků, zajištění dopravní obslužnosti, obohacení o vegetaci.',
                'date' => '2023-04-01',
                'cover_image' => 'storage/app/public/images/namesti-tuchlovice/uvodka.jpg',
                'images_folder' => 'storage/app/public/images/namesti-tuchlovice/img'
            ],
            [
                'title' => 'Zahuštění zástavby za kostelem sv. Mikuláše ve Velkém Meziříčí',
                'full_title' => 'Zahuštění zástavby za kostelem svatého Mikuláše',
                'location' => 'Velké Meziříčí',
                'author' => 'Ing. arch. Anna Laubová',
                'supervisor' => 'doc. Ing. arch. Zdeněk Rothbauer',
                'rating' => '2. místo v přehlídce diplomních projektů ČKA',
                'project_type' => 'diplomová práce FA ČVUT',
                'annotation' => '
                    Doplňuji vhodnou strukturu pro navrácení kompaktnosti centra města.
                    Odhaluji městský náhon, dříve oddělující křesťanskou a židovskou část města.
                    Penzion s pivnicí, nové náměstí a veřejný dvorek na severu řešeného území
                    slouží pro potkání místních i turistů.
                    Funkce setkávání se navrátí do místa zničeného centra židovského ghetta.
                    Základní umělecká škola a veřejná zahrada u kostela na jihu řešeného území.
                    Jde o místo pro výuku, modlitbu i uvolnění',
                'date' => '2022-02-01',
                'cover_image' => 'storage/app/public/images/kostel-velke-mezirici/uvodka.jpg',
                'images_folder' => 'storage/app/public/images/kostel-velke-mezirici/img'
            ],
            [
                'title' => 'Stará Hasička v Brně',
                'full_title' => 'Stará Hasička',
                'location' => 'Brno - Komín',
                'author' => 'Ing. arch. Anna Laubová, Ing. arch. Norbert Lichý, doc. Ing. arch. Zdeněk Rothbauer',
                'project_type' => 'rekonstrukce budovy a veřejný prostor',
                'annotation' => '
                    Nový dům nevybočuje, je vážný a uctivý. Respektuje okolní zástavbu. Drží si charakter předešlé budovy, ale prezentuje se v moderním rázu. Dům stojí pevně na náměstí. I navzdory tomu je otevřený.
                    Jednotlivé provozy se prolínají v pěti různých výškových úrovních. Odlišné aktivity, různé věkové kategorie, rozdílné výšky – jeden dům. Prostory spolu komunikují, přesto nejsou příchozí rušeni ve svých činnostech.',
                'date' => '2019-09-01',
                'cover_image' => 'storage/app/public/images/hasicka-brno/uvodka.jpg',
                'images_folder' => 'storage/app/public/images/hasicka-brno/img'
            ],
            [
                'title' => 'Římskokatolický kostel v Praze - Holešovicích',
                'full_title' => 'Římskokatolický kostel',
                'location' => 'Praha - Holešovice',
                'author' => 'Ing. arch. Anna Laubová',
                'rating' => 'nominace v soutěži Olověný Dušan',
                'project_type' => 'semestrální práce FA ČVUT',
                'supervisor' => 'doc. Ing. arch. Zdeněk Rothbauer',
                'annotation' => '
                    Na první pohled zapadá do nové blokové struktury, navržené na rozmezí dnešní neutěšené zástavby okolo nádraží Praha – Holešovice a nezastavěných ploch v místě bývalého nákladového nádraží Bubny, na rohu ulic Partyzánská a Vrbenského. Dodržení přesné orientace kostela východ – západ vede k vybočení z očekávaného směru a k odsazení od stavební čáry nejbližších bloků, stavba tím nabývá na významu. Použití cihel jako hlavního materiálu odkazuje na industriální historii Holešovic. S cihlou je zacházeno tradičně, dům je navržen tak, aby mohly být dodrženy obvyklé postupy při práci s tímto materiálem. Samotný chrám je složen ze sedmi stejných dílů poukazujících na symboliku čísla sedm v křesťanství jakožto čísla dokonalosti.',
                'date' => '2021-01-01',
                'cover_image' => 'storage/app/public/images/kostel-praha/uvodka.jpg',
                'images_folder' => 'storage/app/public/images/kostel-praha/img'
            ]
        ];

        foreach ($projects as $projectData) {
            $project = Project::create([
                'title' => $projectData['title'],
                'full_title' => $projectData['full_title'],
                'location' => $projectData['location'] ?? '',
                'author' => $projectData['author'] ?? 'Neznámý autor',
                'phase' => $projectData['phase'] ?? null,
                'rating' => $projectData['rating'] ?? null,
                'project_type' => $projectData['project_type'] ?? '',
                'annotation' => $projectData['annotation'] ?? '',
                'description' => $projectData['description'] ?? '',
                'scope_of_work' => $projectData['scope_of_work'] ?? null,
                'date' => $projectData['date'] ?? null,
                'cover_image' => $projectData['cover_image'] ?? ''
            ]);
                $imagesFolder = storage_path('app/public/images/' . $projectData['images_folder']);
                if (File::exists($imagesFolder)) {
                    $images = File::files($imagesFolder);

                    foreach ($images as $image) {
                        $imageName = basename($image);
                        ProjectImage::create([
                            'project_id' => $project->id,
                            'image_path' => "storage/images/{$projectData['images_folder']}/{$imageName}"
                        ]);
                    }
                }
            }
        }
}

