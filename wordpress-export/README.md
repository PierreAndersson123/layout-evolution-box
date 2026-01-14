# Testföretag - WordPress Export

Denna mapp innehåller en komplett statisk HTML/CSS-version av Testföretag-webbplatsen, redo att laddas upp till WordPress.

## Mappstruktur

```
wordpress-export/
├── css/
│   └── style.css          # Alla stilar (CSS variabler, layout, komponenter)
├── images/                 # Kopiera bilderna hit (se nedan)
├── index.html             # Startsida (Hem)
├── om-oss.html            # Om oss
├── fastigheter.html       # Fastigheter
├── projektutveckling.html # Projektutveckling
├── lediga-lokaler.html    # Lediga lokaler
└── README.md              # Denna fil
```

## Instruktioner för WordPress

### 1. Kopiera bilder

Innan du laddar upp, kopiera alla bilder från `src/assets/` till `wordpress-export/images/`:

- hero-facade.jpg
- about-hero.jpg
- property-hero.jpg
- premises-hero.jpg
- project-hero.jpg
- cta-background.jpg
- office-interior-1.jpg
- office-interior-2.jpg
- property-1.jpg
- property-2.jpg
- property-3.jpg
- property-4.jpg
- premises-1.jpg
- premises-2.jpg
- premises-3.jpg

### 2. Alternativ A: Som WordPress-tema

1. Skapa en ny temamapp i `/wp-content/themes/testforetag/`
2. Konvertera HTML-filerna till PHP-templates:
   - `index.html` → `front-page.php`
   - `om-oss.html` → `page-om-oss.php`
   - etc.
3. Skapa `style.css` med tema-header
4. Skapa `functions.php` för att ladda CSS

### 3. Alternativ B: Som statiska sidor

1. Ladda upp alla HTML-filer till WordPress Media Library eller via FTP
2. Använd ett plugin som "WP Static HTML Pages" för att integrera
3. Eller skapa WordPress-sidor och kopiera in HTML-koden i "Custom HTML"-block

### 4. Alternativ C: Page Builder

Kopiera designen manuellt till Elementor, Divi eller liknande:
- Använd CSS-variablerna från `style.css`
- Återskapa layouten med page builder-block
- Importera bilder till Media Library

## Teknisk information

### CSS-variabler (Design Tokens)

```css
--primary: hsl(224, 58%, 33%);      /* Navy blå accent */
--foreground: hsl(222, 47%, 11%);   /* Mörk text */
--muted-foreground: hsl(215, 16%, 47%); /* Ljusare text */
--background: hsl(0, 0%, 100%);     /* Vit bakgrund */
--secondary: hsl(210, 40%, 96%);    /* Ljusgrå bakgrund */
--border: hsl(214, 32%, 91%);       /* Kantfärg */
--radius: 0.5rem;                   /* Hörnradie */
```

### Typografi

- Font: Inter (Google Fonts)
- H1: 2.5rem → 3.75rem (responsiv)
- H2: 2rem → 2.5rem
- Brödtext: 16px, line-height 1.6

### Responsiva brytpunkter

- 640px: Små skärmar
- 768px: Tablet
- 1024px: Desktop
- 1280px: Stor desktop

## Funktioner inkluderade

✅ Sticky header med mobilmeny
✅ Hero-sektioner med overlay
✅ Kort-komponenter för fastigheter/lokaler
✅ Filterbar med sök och sortering
✅ CTA-band med bakgrundsbild
✅ Tidslinje (Om oss)
✅ Processsteg (Projektutveckling)
✅ Modaler för detaljer
✅ Cookie-consent med inställningar
✅ Footer med nyhetsbrev
✅ Fullt responsiv design

## Support

Vid frågor om konvertering till WordPress-tema, kontakta webbutvecklaren.
