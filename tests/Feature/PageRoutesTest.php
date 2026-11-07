<?php

namespace Tests\Feature;

use Tests\TestCase;

class PageRoutesTest extends TestCase
{
    public function test_public_pages_return_successfully(): void
    {
        $this->withoutVite();

        $this->get('/')->assertOk();
        $this->get('/dashboard')->assertOk()->assertSee('Dashboard Aksi');
        $this->get('/edukasi?jenis=organik')->assertOk()->assertSee('Organik');
        $this->get('/edukasi?jenis=tidak-ada')->assertOk()->assertSee('Edukasi Sampah');
        $this->get('/panduan')->assertOk()->assertSee('Panduan Sampah');
        $this->get('/artikel')->assertOk();
    }

    public function test_feature_assets_are_present(): void
    {
        foreach ([
            'js/ai_scanner.js',
            'js/chat.js',
            'js/data_lokasi_peta.js',
            'js/data_sampah.js',
            'js/data_statistik.js',
            'js/eco_action.js',
            'js/peta.js',
            'model/model.json',
            'model/metadata.json',
            'model/model_config.js',
            'model/weights.bin',
        ] as $asset) {
            $this->assertFileExists(public_path($asset));
        }
    }

    public function test_scanner_exposes_open_function_and_model_base(): void
    {
        $scanner = file_get_contents(public_path('js/ai_scanner.js'));

        $this->assertStringContainsString('window.openBaliElingScanner', $scanner);
        $this->assertStringContainsString('window.BALI_MODEL_BASE', $scanner);
    }
}
