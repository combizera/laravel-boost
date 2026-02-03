<?php

namespace App\Filament\Pages;

use App\Enums\SettingType;
use App\Models\Setting;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class LandingPageSettings extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-s-home';

    protected string $view = 'filament.pages.settings-form';

    protected static ?string $slug = 'landing-page';

    public ?array $data = [];

    public static function getNavigationGroup(): ?string
    {
        return 'Conteúdo';
    }

    public static function getNavigationLabel(): string
    {
        return 'Página Inicial';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public function getTitle(): string
    {
        return 'Configurações da Página Inicial';
    }

    public function mount(): void
    {
        // Load Hero data
        $heroData = [
            'hero_title' => Setting::get('hero.title', 'Encontre a garrafa certa para o seu momento.'),
            'hero_subtitle' => Setting::get('hero.subtitle', ''),
            'hero_description' => Setting::get('hero.description', ''),
            'hero_cta_text' => Setting::get('hero.cta_text', 'Comece sua descoberta'),
            'hero_cta_url' => Setting::get('hero.cta_url', '#'),
            'hero_cta_secondary_text' => Setting::get('hero.cta_secondary_text', ''),
            'hero_cta_secondary_url' => Setting::get('hero.cta_secondary_url', ''),
            'hero_image' => Setting::get('hero.image', 'https://funphotobooth.com.br/?s=62540867011700'),
            'hero_image_url' => Setting::get('hero.image_url', ''),
        ];

        // Load Features data
        $featuresData = [
            'features_kicker' => Setting::get('features.kicker', 'Por que nos escolher'),
            'features_title' => Setting::get('features.title', 'Claro, calmo e genuinamente útil.'),
            'features_description' => Setting::get('features.description', 'Mantemos as notas legíveis: frutas, estrutura, finalização e harmonização — apresentadas com generoso espaçamento em branco para que você possa escanear sem esforço.'),
        ];

        // Load feature cards
        $features = [];
        for ($i = 1; $i <= 4; $i++) {
            $title = Setting::get("features.item_{$i}.title");
            if ($title) {
                $features[] = [
                    'title' => $title,
                    'description' => Setting::get("features.item_{$i}.description", ''),
                    'icon' => Setting::get("features.item_{$i}.icon", 'wine'),
                ];
            }
        }

        // Default features if none exist
        if (empty($features)) {
            $features = [
                [
                    'title' => 'Seleção Premium',
                    'description' => 'Uvas selecionadas à mão de nossos melhores vinhedos, garantindo qualidade excepcional em cada garrafa.',
                    'icon' => 'grape',
                ],
                [
                    'title' => 'Qualidade Premiada',
                    'description' => 'Vinhos reconhecidos internacionalmente com medalhas de competições prestigiadas em todo o mundo.',
                    'icon' => 'award',
                ],
                [
                    'title' => 'Práticas Sustentáveis',
                    'description' => 'Comprometidos com métodos de cultivo ecológicos que preservam nossa terra para as futuras gerações.',
                    'icon' => 'leaf',
                ],
                [
                    'title' => 'Métodos Tradicionais',
                    'description' => 'Técnicas de vinificação consagradas pelo tempo, transmitidas através de gerações de mestres vinicultores.',
                    'icon' => 'wine',
                ],
            ];
        }

        $featuresData['features'] = $features;

        $this->form->fill(array_merge($heroData, $featuresData));
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                // HERO SECTION
                Section::make('Seção Hero (Topo da Página)')
                    ->description('Configure o conteúdo principal exibido no topo da página')
                    ->icon('heroicon-o-rocket-launch')
                    ->collapsible()
                    ->schema([
                        Section::make('Conteúdo Principal')
                            ->icon('heroicon-o-document-text')
                            ->columns(1)
                            ->schema([
                                TextInput::make('hero_subtitle')
                                    ->label('Subtítulo (Badge)')
                                    ->placeholder('Ex: Descoberta premium, sem sobrecarga')
                                    ->helperText('Texto pequeno exibido acima do título em um badge (opcional)')
                                    ->maxLength(255),

                                TextInput::make('hero_title')
                                    ->label('Título Principal')
                                    ->placeholder('Ex: Encontre a garrafa certa para o seu momento.')
                                    ->helperText('O título principal da seção hero')
                                    ->required()
                                    ->maxLength(255),

                                Textarea::make('hero_description')
                                    ->label('Descrição')
                                    ->placeholder('Ex: Diga-nos o que você está procurando — vamos sugerir vinhos...')
                                    ->helperText('Texto de apoio abaixo do título (opcional)')
                                    ->rows(3)
                                    ->maxLength(500),
                            ]),

                        Section::make('Botões de Ação')
                            ->icon('heroicon-o-cursor-arrow-rays')
                            ->columns(2)
                            ->schema([
                                TextInput::make('hero_cta_text')
                                    ->label('Texto do Botão Principal')
                                    ->placeholder('Ex: Comece sua descoberta')
                                    ->helperText('Texto do botão de ação principal')
                                    ->required(),

                                TextInput::make('hero_cta_url')
                                    ->label('Link do Botão Principal')
                                    ->placeholder('Ex: /contato ou https://...')
                                    ->helperText('Para onde o botão deve direcionar')
                                    ->url()
                                    ->required(),

                                TextInput::make('hero_cta_secondary_text')
                                    ->label('Texto do Botão Secundário (Opcional)')
                                    ->placeholder('Ex: Explorar a adega')
                                    ->helperText('Deixe em branco para ocultar o botão secundário'),

                                TextInput::make('hero_cta_secondary_url')
                                    ->label('Link do Botão Secundário')
                                    ->placeholder('Ex: /produtos ou https://...')
                                    ->helperText('Para onde o botão secundário deve direcionar')
                                    ->url(),
                            ]),

                        Section::make('Imagem da Hero')
                            ->icon('heroicon-o-photo')
                            ->columns(1)
                            ->schema([
                                TextInput::make('hero_image')
                                    ->label('URL da Imagem')
                                    ->placeholder('Ex: https://exemplo.com/imagem.jpg')
                                    ->helperText('URL direta da imagem que será exibida')
                                    ->url()
                                    ->required(),

                                TextInput::make('hero_image_url')
                                    ->label('Link da Imagem (Opcional)')
                                    ->placeholder('Ex: https://exemplo.com/promocao')
                                    ->helperText('URL para navegar ao clicar na imagem. Deixe em branco para sem link.')
                                    ->url(),
                            ]),
                    ]),

                // FEATURES SECTION
                Section::make('Seção de Recursos')
                    ->description('Configure os cards de recursos/diferenciais da sua empresa')
                    ->icon('heroicon-o-squares-2x2')
                    ->collapsible()
                    ->schema([
                        Section::make('Cabeçalho da Seção')
                            ->icon('heroicon-o-document-text')
                            ->columns(1)
                            ->schema([
                                TextInput::make('features_kicker')
                                    ->label('Texto Kicker')
                                    ->placeholder('Ex: Por que nos escolher')
                                    ->helperText('Texto pequeno em maiúsculas acima do título')
                                    ->maxLength(255),

                                TextInput::make('features_title')
                                    ->label('Título da Seção')
                                    ->placeholder('Ex: Claro, calmo e genuinamente útil.')
                                    ->helperText('O título principal da seção de recursos')
                                    ->required()
                                    ->maxLength(255),

                                Textarea::make('features_description')
                                    ->label('Descrição da Seção')
                                    ->placeholder('Ex: Mantemos as notas legíveis...')
                                    ->helperText('Texto de apoio abaixo do título')
                                    ->rows(3)
                                    ->maxLength(500),
                            ]),

                        Section::make('Cards de Recursos')
                            ->icon('heroicon-o-squares-plus')
                            ->description('Configure até 4 cards de recursos (exibidos em grade 2x2)')
                            ->schema([
                                Repeater::make('features')
                                    ->label('Cards')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Título do Card')
                                            ->placeholder('Ex: Seleção Premium')
                                            ->required()
                                            ->maxLength(255)
                                            ->columnSpan(2),

                                        Textarea::make('description')
                                            ->label('Descrição do Card')
                                            ->placeholder('Ex: Uvas selecionadas à mão de nossos melhores vinhedos...')
                                            ->required()
                                            ->rows(2)
                                            ->maxLength(500)
                                            ->columnSpan(2),

                                        Select::make('icon')
                                            ->label('Ícone')
                                            ->options([
                                                'wine' => '🍷 Garrafa de Vinho',
                                                'grape' => '🌍 Uva/Globo',
                                                'award' => '🏆 Prêmio/Medalha',
                                                'leaf' => '🍃 Folha/Sustentabilidade',
                                                'sparkles' => '✨ Brilho/Premium',
                                            ])
                                            ->helperText('Selecione um ícone que representa este recurso')
                                            ->required()
                                            ->default('wine')
                                            ->columnSpan(1),
                                    ])
                                    ->columns(3)
                                    ->defaultItems(4)
                                    ->minItems(1)
                                    ->maxItems(4)
                                    ->reorderable()
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['title'] ?? 'Novo Card')
                                    ->addActionLabel('Adicionar Card de Recurso')
                                    ->reorderableWithButtons()
                                    ->collapsed(false),
                            ]),
                    ]),
            ]);
    }

    public function save(): void
    {
        $data = $this->form->getState();

        // Save Hero Content
        Setting::set('hero.title', $data['hero_title'], SettingType::TEXT, 'hero');
        Setting::set('hero.subtitle', $data['hero_subtitle'] ?? '', SettingType::TEXT, 'hero');
        Setting::set('hero.description', $data['hero_description'] ?? '', SettingType::TEXT, 'hero');

        // Save Hero CTA
        Setting::set('hero.cta_text', $data['hero_cta_text'], SettingType::TEXT, 'hero');
        Setting::set('hero.cta_url', $data['hero_cta_url'], SettingType::URL, 'hero');
        Setting::set('hero.cta_secondary_text', $data['hero_cta_secondary_text'] ?? '', SettingType::TEXT, 'hero');
        Setting::set('hero.cta_secondary_url', $data['hero_cta_secondary_url'] ?? '', SettingType::URL, 'hero');

        // Save Hero Image
        Setting::set('hero.image', $data['hero_image'], SettingType::URL, 'hero');
        Setting::set('hero.image_url', $data['hero_image_url'] ?? '', SettingType::URL, 'hero');

        // Save Features Header
        Setting::set('features.kicker', $data['features_kicker'], SettingType::TEXT, 'features');
        Setting::set('features.title', $data['features_title'], SettingType::TEXT, 'features');
        Setting::set('features.description', $data['features_description'] ?? '', SettingType::TEXT, 'features');

        // Delete old feature items
        Setting::where('group', 'features')
            ->where('key', 'like', 'features.item_%')
            ->delete();

        // Save feature cards
        foreach ($data['features'] as $index => $feature) {
            $itemNumber = $index + 1;
            Setting::set("features.item_{$itemNumber}.title", $feature['title'], SettingType::TEXT, 'features');
            Setting::set("features.item_{$itemNumber}.description", $feature['description'], SettingType::TEXT, 'features');
            Setting::set("features.item_{$itemNumber}.icon", $feature['icon'], SettingType::TEXT, 'features');
        }

        Notification::make()
            ->success()
            ->title('Configurações salvas!')
            ->body('A página inicial foi atualizada com sucesso.')
            ->send();
    }
}
