# Testföretag WordPress Theme

Ett modernt och skandinaviskt WordPress-tema för fastighetsbolag, utvecklat med fokus på hållbarhet, användarvänlighet och professionell presentation.

## Installation

1. Ladda upp hela `testforetag`-mappen till `/wp-content/themes/`
2. Aktivera temat via **Utseende → Teman** i WordPress admin
3. Gå till **Utseende → Anpassa** för att konfigurera temat

## Mappstruktur

```
testforetag/
├── assets/
│   ├── css/
│   │   ├── custom.css          # Ytterligare anpassade stilar
│   │   └── editor-style.css    # Gutenberg editor-stilar
│   ├── images/                 # Temaets bilder (lägg dina bilder här)
│   └── js/
│       └── main.js             # Huvud-JavaScript
├── inc/
│   ├── template-functions.php  # Hjälpfunktioner
│   └── template-tags.php       # Template tags
├── template-parts/
│   ├── card-fastighet.php      # Fastighetskort-mall
│   ├── card-lokal.php          # Lokalkort-mall
│   ├── content.php             # Standardinnehåll
│   ├── content-none.php        # Inga resultat
│   └── content-search.php      # Sökresultat
├── 404.php                     # 404-sida
├── archive.php                 # Arkivsidor
├── comments.php                # Kommentarer
├── footer.php                  # Footer
├── front-page.php              # Startsida
├── functions.php               # Tema-funktioner
├── header.php                  # Header
├── index.php                   # Fallback-mall
├── page.php                    # Generisk sida
├── page-fastigheter.php        # Fastigheter-mall
├── page-kontakt.php            # Kontakt-mall
├── page-lediga-lokaler.php     # Lediga lokaler-mall
├── page-om-oss.php             # Om oss-mall
├── page-projektutveckling.php  # Projektutveckling-mall
├── search.php                  # Söksida
├── searchform.php              # Sökformulär
├── sidebar.php                 # Sidebar
├── single.php                  # Enskilda inlägg
└── style.css                   # Huvudstilmall
```

## Funktioner

### Custom Post Types

Temat registrerar följande anpassade posttyper:

- **Fastigheter** (`fastighet`) - För att visa fastighetsportföljen
- **Lediga Lokaler** (`lokal`) - För att visa lediga lokaler
- **Projekt** (`projekt`) - För att visa projektutvecklingar

### Taxonomier

- **Områden** - Geografiska områden för fastigheter
- **Fastighetstyper** - Typ av fastighet (Kontor, Handel, Lager, etc.)
- **Lokaltyper** - Typ av lokal
- **Projektstatus** - Status för projekt

### Widgetområden

- Footer Kontakt
- Footer Snabblänkar
- Footer Nyhetsbrev
- Footer Social
- Sidebar

### Menyplatser

- **Huvudmeny** - Desktop-navigation
- **Footermeny** - Footer-navigation
- **Mobilmeny** - Mobilnavigation

### Theme Customizer

Anpassa följande via **Utseende → Anpassa**:

- Företagsnamn
- Adress
- Telefon
- E-post
- Hero-rubrik och underrubrik
- Hero-bakgrundsbild
- Cookie-meddelande
- Sociala medier-länkar

## Sidmallar

Skapa sidor med följande sidmallar:

1. **Startsida** - Använd mall: "Startsida"
2. **Om oss** - Skapa sida "Om oss", tilldela mall: "Om oss"
3. **Fastigheter** - Skapa sida "Fastigheter", tilldela mall: "Fastigheter"
4. **Projektutveckling** - Skapa sida "Projektutveckling", tilldela mall: "Projektutveckling"
5. **Lediga lokaler** - Skapa sida "Lediga lokaler", tilldela mall: "Lediga lokaler"
6. **Kontakt** - Skapa sida "Kontakt", tilldela mall: "Kontakt"

## Bilder

Kopiera dina bilder till `/assets/images/` med följande namn:

- `hero-facade.jpg` - Hero-bild för startsidan
- `about-hero.jpg` - Hero-bild för Om oss
- `property-hero.jpg` - Hero-bild för Fastigheter
- `premises-hero.jpg` - Hero-bild för Lediga lokaler
- `project-hero.jpg` - Hero-bild för Projektutveckling
- `cta-background.jpg` - Bakgrund för CTA-band
- `office-interior-1.jpg` - Kontorsinteriör
- `office-interior-2.jpg` - Kontorsinteriör
- `property-1.jpg` till `property-4.jpg` - Fastighetsbilder
- `premises-1.jpg` till `premises-3.jpg` - Lokalbilder

## Kompatibilitet

- WordPress 6.0+
- PHP 8.0+
- Alla moderna webbläsare

## Rekommenderade plugins

- **Contact Form 7** - Kontaktformulär
- **Yoast SEO** - Sökmotoroptimering
- **WP Super Cache** - Prestanda
- **Updraft Plus** - Backup

## Anpassning

### Färger

Ändra färgerna i `style.css` under `:root`:

```css
:root {
    --primary: 224 58% 33%;        /* Navy blå */
    --foreground: 222 47% 11%;     /* Mörk text */
    --secondary: 210 40% 96%;      /* Ljusgrå */
    /* ... etc */
}
```

### Typografi

Temat använder Google Fonts Inter. Ändra i `functions.php` om du vill använda en annan font.

## Support

Vid frågor eller problem, kontakta webbutvecklaren.

## Licens

GNU General Public License v2 or later
