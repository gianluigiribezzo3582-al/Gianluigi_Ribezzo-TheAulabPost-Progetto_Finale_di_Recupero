<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $writers  = User::where('role', 'writer')->get();
        $revisor  = User::where('role', 'revisor')->first();
        $categories = Category::all();

        $articles = [
            [
                'title'    => 'Il futuro dell\'intelligenza artificiale in Italia',
                'subtitle' => 'Come le aziende italiane stanno adottando l\'AI nei propri processi',
                'body'     => 'L\'intelligenza artificiale sta trasformando il panorama imprenditoriale italiano. Dalle PMI alle grandi corporation, sempre più realtà stanno integrando soluzioni basate su machine learning e automazione nei loro flussi di lavoro quotidiani. Secondo un recente report di Confindustria Digitale, il mercato dell\'AI in Italia ha registrato una crescita del 32% nell\'ultimo anno, raggiungendo un valore di 500 milioni di euro. Le applicazioni più diffuse riguardano la customer care automatizzata, l\'analisi predittiva delle vendite e l\'ottimizzazione della supply chain. Tuttavia, rimangono aperti importanti interrogativi etici e formativi: come garantire che la forza lavoro sia pronta per questa transizione? La risposta sembra risiedere in programmi di upskilling mirati e in una collaborazione più stretta tra università e imprese.',
                'category' => 'Tech',
                'with_image' => true,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Serie A: Milan e Juventus si dividono la posta',
                'subtitle' => 'Il derby d\'Italia finisce 1-1 allo stadio Meazza',
                'body'     => 'Una partita intensa e combattuta quella andata in scena ieri sera a Milano. Il Milan e la Juventus hanno offerto agli spettatori del Meazza uno spettacolo di grande livello tecnico, terminato con un pareggio che lascia entrambe le squadre con un punto in più in classifica. La Juventus è passata in vantaggio al 23° minuto con una rete di testa su calcio d\'angolo. Il Milan ha risposto nella ripresa con un tiro dal limite che non ha lasciato scampo al portiere bianconero. Nella fase finale entrambe le squadre hanno avuto occasioni per chiuderla, ma la precisione è mancata nei momenti cruciali. Il pareggio tiene entrambe le formazioni nella lotta per le posizioni europee.',
                'category' => 'Sport',
                'with_image' => true,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Mercati europei: spread in calo, borse in rialzo',
                'subtitle' => 'La BCE mantiene i tassi stabili, segnale positivo per i mercati',
                'body'     => 'La decisione della Banca Centrale Europea di mantenere invariati i tassi di interesse ha dato una spinta positiva ai mercati finanziari europei. Lo spread BTP-Bund è sceso sotto quota 120 punti base per la prima volta negli ultimi sei mesi, mentre Piazza Affari ha chiuso la seduta con un guadagno del 1,8%. Gli analisti interpretano questo come un segnale di stabilità macroeconomica. "La BCE ha dimostrato di saper bilanciare la lotta all\'inflazione con la necessità di sostenere la crescita", ha commentato un economista della principale banca di investimento milanese. Le previsioni per il prossimo trimestre restano caute ma tendenzialmente ottimistiche.',
                'category' => 'Economia',
                'with_image' => false,
                'is_accepted' => true,
            ],
            [
                'title'    => 'La riforma della giustizia torna in parlamento',
                'subtitle' => 'Nuovo round di discussioni sulla separazione delle carriere',
                'body'     => 'Il disegno di legge sulla riforma della giustizia è tornato al centro del dibattito parlamentare questa settimana. La proposta, che prevede tra l\'altro la separazione delle carriere tra giudici e pubblici ministeri, continua a dividere la maggioranza e l\'opposizione. I favorevoli sottolineano la necessità di garantire maggiore imparzialità nel sistema giudiziario. I contrari temono invece che la riforma indebolisca l\'indipendenza della magistratura. Le audizioni degli esperti in commissione si sono concluse ieri e l\'aula dovrebbe votare entro fine mese. L\'esito rimane incerto, con alcuni parlamentari della maggioranza che hanno espresso perplessità su alcuni articoli specifici.',
                'category' => 'Politica',
                'with_image' => false,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Sanremo 2026: i favoriti e le sorprese dell\'ultima ora',
                'subtitle' => 'Analisi delle canzoni in gara e dei possibili vincitori',
                'body'     => 'Mancano poche settimane all\'inizio del Festival di Sanremo 2026 e già fervono le discussioni tra appassionati e critici musicali. Quest\'anno il cast presenta una interessante mescolanza di artisti affermati e nuove voci emergenti. Tra i favoriti spiccano alcuni nomi storici della musica italiana, affiancati da artisti della scena urban e indie che stanno conquistando le classifiche streaming. La novità di quest\'anno è l\'introduzione di una sezione dedicata alle collaborazioni internazionali, che potrebbe portare a performance inedite e sorprendenti. I bookmaker già piazzano le loro quote, ma la storia del festival insegna che spesso sono le sorprese a trionfare.',
                'category' => 'Intrattenimento',
                'with_image' => true,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Alimentazione e longevità: i segreti della dieta mediterranea',
                'subtitle' => 'Nuovi studi confermano i benefici per la salute cardiovascolare',
                'body'     => 'Un\'ampia ricerca condotta su oltre 12.000 partecipanti in cinque paesi europei ha confermato ciò che i nutrizionisti sostengono da decenni: la dieta mediterranea riduce significativamente il rischio di malattie cardiovascolari. Lo studio, pubblicato su una delle principali riviste mediche internazionali, ha evidenziato che chi segue regolarmente questo regime alimentare presenta un rischio inferiore del 28% di sviluppare problemi cardiaci rispetto a chi segue diete occidentali ricche di grassi saturi. Gli alimenti chiave sono l\'olio d\'oliva extravergine, i legumi, il pesce azzurro e la frutta secca. I ricercatori sottolineano anche l\'importanza dell\'aspetto sociale dei pasti, spesso trascurato nelle analisi puramente nutrizionali.',
                'category' => 'Economia',
                'with_image' => true,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Open source e startup: l\'ecosistema italiano cresce',
                'subtitle' => 'Milano e Roma guidano la classifica degli hub tecnologici europei',
                'body'     => 'Il rapporto annuale sullo stato delle startup italiane rivela una crescita sostenuta dell\'ecosistema tech nazionale. Con oltre 14.000 startup attive e investimenti che hanno superato i 2 miliardi di euro nell\'ultimo anno, l\'Italia si posiziona tra i primi cinque paesi europei per dinamismo del settore. Milano rimane il principale hub, ma Roma sta recuperando terreno grazie a una serie di iniziative pubbliche e private che stanno creando un ambiente favorevole all\'innovazione. Particolarmente vivace il settore fintech e quello delle soluzioni green. La sfida principale rimane attrarre e trattenere talenti, in un mercato sempre più competitivo a livello europeo.',
                'category' => 'Tech',
                'with_image' => true,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Nuovi trend nel food: fermentati e cucina di recupero',
                'subtitle' => 'I ristoratori italiani adottano pratiche sempre più sostenibili',
                'body'     => 'La cucina italiana sta vivendo una doppia rivoluzione: da un lato la riscoperta degli alimenti fermentati tradizionali come il pane a lievitazione naturale, i formaggi artigianali e le verdure in salamoia; dall\'altro una crescente attenzione alla cucina di recupero, che valorizza scarti e avanzi trasformandoli in piatti creativi e gustosi. Chef di tutto il paese stanno abbracciando questa filosofia non solo per ragioni etiche, ma anche economiche e di differenziazione. Il risultato è una cucina più ricca, complessa e rispettosa delle risorse naturali. Diversi ristoranti si sono già aggiudicati riconoscimenti internazionali proprio per queste pratiche innovative.',
                'category' => 'Food&Drink',
                'with_image' => false,
                'is_accepted' => true,
            ],
            [
                'title'    => 'Autonomia differenziata: le regioni del Sud si mobilitano',
                'subtitle' => 'Governi regionali e sindaci protestano contro la proposta di legge',
                'body'     => 'La proposta di legge sull\'autonomia differenziata continua a far discutere. Nelle ultime settimane le regioni del Sud Italia hanno intensificato le loro proteste, organizzando convegni, manifestazioni e inviando formali osservazioni al governo centrale. La preoccupazione principale riguarda la possibile accentuazione dei divari economici e sociali tra Nord e Sud del paese. I presidenti di regione di Campania, Calabria, Sicilia e Puglia hanno firmato un documento congiunto in cui chiedono modifiche sostanziali al testo. Il governo ha aperto a un dialogo, pur ribadendo la volontà di procedere con la riforma. Il dibattito coinvolge anche accademici ed esperti di diritto costituzionale.',
                'category' => 'Politica',
                'with_image' => false,
                'is_accepted' => null,
            ],
            [
                'title'    => 'Calcio femminile: l\'Italia vola alle Olimpiadi',
                'subtitle' => 'Le azzurre battono la Svezia e staccano il biglietto per Parigi',
                'body'     => 'Una prestazione storica quella della nazionale femminile italiana di calcio, che ha conquistato la qualificazione alle Olimpiadi di Parigi con una vittoria convincente sulla Svezia. Le azzurre hanno dominato il match fin dai primi minuti, segnando due gol nel primo tempo e controllando il gioco nella ripresa. La prestazione ha confermato i progressi del calcio femminile italiano degli ultimi anni, frutto di investimenti crescenti da parte delle società e di una maggiore attenzione mediatica. "È un momento storico per il nostro movimento", ha dichiarato la capitana al termine della partita tra le lacrime di gioia. La qualificazione alle Olimpiadi è vista come un trampolino per il futuro del calcio femminile in Italia.',
                'category' => 'Sport',
                'with_image' => true,
                'is_accepted' => null,
            ],
            [
                'title'    => 'Quantum computing: l\'Italia entra nel club dei pionieri',
                'subtitle' => 'Inaugurato a Bologna il primo centro di ricerca quantistica nazionale',
                'body'     => 'L\'Italia ha compiuto un passo importante nel campo del quantum computing con l\'inaugurazione del Centro Nazionale per il Calcolo Quantistico di Bologna. La struttura, frutto di un investimento pubblico-privato di 120 milioni di euro, ospiterà alcuni dei più avanzati computer quantistici d\'Europa. Il centro collaborerà con le principali università italiane e con centri di ricerca internazionali per sviluppare applicazioni in settori che vanno dalla crittografia alla simulazione molecolare, dalla logistica all\'intelligenza artificiale. "Questo è il momento in cui l\'Italia decide di non essere uno spettatore ma un protagonista della prossima rivoluzione tecnologica", ha dichiarato il ministro dell\'università all\'inaugurazione.',
                'category' => 'Tech',
                'with_image' => false,
                'is_accepted' => false,
            ],
            [
                'title'    => 'Vino italiano: export record nel primo trimestre',
                'subtitle' => 'Germania e USA i mercati più dinamici per i nostri produttori',
                'body'     => 'Il settore vitivinicolo italiano archivia un primo trimestre da record con un incremento delle esportazioni del 18% rispetto allo stesso periodo dell\'anno precedente. I dati, elaborati dall\'Osservatorio del vino italiano, mostrano una domanda crescente soprattutto in Germania, Stati Uniti e Giappone. I vini più richiesti all\'estero sono il Prosecco, il Barolo e il Brunello di Montalcino, ma cresce anche l\'interesse per etichette meno conosciute di regioni come la Campania e la Sicilia. I produttori guardano con ottimismo al resto dell\'anno, pur segnalando alcune difficoltà legate ai costi energetici e alla siccità che ha interessato alcune zone viticole nella scorsa stagione.',
                'category' => 'Food&Drink',
                'with_image' => true,
                'is_accepted' => true,
            ],
        ];

        foreach ($articles as $i => $data) {
            $writer = $writers[$i % $writers->count()];
            $category = $categories->firstWhere('name', $data['category'])
                ?? $categories->first();

            $imagePath = null;
            if ($data['with_image']) {
                $imagePath = $this->generateImage('articles');
            }

            $articleData = [
                'title'       => $data['title'],
                'slug'        => Str::slug($data['title']),
                'subtitle'    => $data['subtitle'],
                'body'        => $data['body'],
                'category_id' => $category->id,
                'user_id'     => $writer->id,
                'is_accepted' => $data['is_accepted'],
                'image'       => $imagePath,
            ];

            if ($data['is_accepted'] === true && $revisor) {
                $articleData['revisor_id'] = $revisor->id;
            }

            Article::create($articleData);
        }
    }

    private function generateImage(string $folder): string
    {
        $palettes = [
            [99, 179, 237],
            [104, 211, 145],
            [246, 173, 85],
            [252, 129, 129],
            [154, 117, 237],
            [237, 137, 104],
            [72, 187, 120],
            [66, 153, 225],
        ];

        [$r, $g, $b] = $palettes[array_rand($palettes)];

        $dir = storage_path("app/public/{$folder}");
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $filename = 'seed_' . uniqid() . '.png';
        file_put_contents("{$dir}/{$filename}", $this->makePng($r, $g, $b, 400, 250));

        return "{$folder}/{$filename}";
    }

    private function makePng(int $r, int $g, int $b, int $w, int $h): string
    {
        $scanlines = '';
        for ($y = 0; $y < $h; $y++) {
            $scanlines .= "\x00"; // filter none
            for ($x = 0; $x < $w; $x++) {
                $scanlines .= chr($r) . chr($g) . chr($b);
            }
        }

        $png  = "\x89PNG\r\n\x1a\n";
        $png .= $this->pngChunk('IHDR', pack('NNCCCCC', $w, $h, 8, 2, 0, 0, 0));
        $png .= $this->pngChunk('IDAT', gzcompress($scanlines, 9));
        $png .= $this->pngChunk('IEND', '');

        return $png;
    }

    private function pngChunk(string $type, string $data): string
    {
        $chunk = $type . $data;
        return pack('N', strlen($data)) . $chunk . pack('N', crc32($chunk));
    }
}
