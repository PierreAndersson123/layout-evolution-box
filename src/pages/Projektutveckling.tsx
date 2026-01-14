import { Layout } from "@/components/layout/Layout";
import { HeroSection } from "@/components/ui/HeroSection";
import { SectionTitle } from "@/components/ui/SectionTitle";
import { Lightbulb, Ruler, HardHat } from "lucide-react";

import projectHero from "@/assets/project-hero.jpg";
import ctaBackground from "@/assets/cta-background.jpg";
import property1 from "@/assets/property-1.jpg";
import property3 from "@/assets/property-3.jpg";
import property4 from "@/assets/property-4.jpg";

const processSteps = [
  {
    icon: Lightbulb,
    title: "Idé & Analys",
    description: "Vi identifierar möjligheter och analyserar marknaden för att säkerställa att våra projekt möter verkliga behov.",
  },
  {
    icon: Ruler,
    title: "Planering & Design",
    description: "Våra arkitekter och ingenjörer skapar genomtänkta lösningar med fokus på funktion, estetik och hållbarhet.",
  },
  {
    icon: HardHat,
    title: "Byggnation & Leverans",
    description: "Vi övervakar hela byggprocessen och säkerställer kvalitet i varje steg fram till färdig fastighet.",
  },
];

const galleryImages = [
  { src: property1, alt: "Modernt kontorsprojekt" },
  { src: property3, alt: "Grön kontorsmiljö" },
  { src: property4, alt: "Hållbart byggande" },
];

const Projektutveckling = () => {
  return (
    <Layout>
      {/* Hero */}
      <HeroSection
        title="Projektutveckling"
        subtitle="Vi bygger framtidens arbetsplatser med fokus på hållbarhet och innovation"
        backgroundImage={projectHero}
        height="medium"
      />

      {/* Process Section */}
      <section className="section-padding">
        <div className="container-site">
          <SectionTitle 
            title="Vår process" 
            subtitle="Från idé till färdig fastighet – vi tar ansvar för hela kedjan"
            align="center"
          />
          <div className="grid md:grid-cols-3 gap-8 mt-12">
            {processSteps.map((step, index) => (
              <div key={step.title} className="text-center">
                <div className="inline-flex items-center justify-center w-16 h-16 rounded-full bg-primary/10 mb-6">
                  <step.icon size={32} className="text-primary" />
                </div>
                <div className="text-sm text-primary font-medium mb-2">Steg {index + 1}</div>
                <h3 className="text-xl font-semibold mb-3">{step.title}</h3>
                <p className="text-muted-foreground">{step.description}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Case Highlight */}
      <section className="section-padding bg-muted/30">
        <div className="container-site">
          <div className="grid md:grid-cols-2 gap-12 lg:gap-20 items-center">
            <div>
              <SectionTitle title="Aktuellt projekt: Eco Business Center" />
              <div className="space-y-4 text-muted-foreground">
                <p>
                  Vårt senaste projekt är Eco Business Center i Hyllie – ett banbrytande 
                  kontorskomplex som sätter nya standarder för hållbart byggande i Malmöregionen.
                </p>
                <p>
                  Byggnaden är utrustad med solpaneler, gröna tak och energieffektiva system 
                  som minskar klimatpåverkan med upp till 60% jämfört med konventionella kontor.
                </p>
                <ul className="space-y-2 mt-6">
                  <li className="flex items-center gap-2">
                    <span className="w-1.5 h-1.5 rounded-full bg-primary" />
                    <span>4 100 m² moderna kontorslokaler</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <span className="w-1.5 h-1.5 rounded-full bg-primary" />
                    <span>BREEAM Excellent-certifiering</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <span className="w-1.5 h-1.5 rounded-full bg-primary" />
                    <span>Flexibla planslösningar</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <span className="w-1.5 h-1.5 rounded-full bg-primary" />
                    <span>Färdigställande Q4 2025</span>
                  </li>
                </ul>
              </div>
            </div>
            <div>
              <img
                src={ctaBackground}
                alt="Eco Business Center"
                className="rounded-lg shadow-lg w-full"
              />
            </div>
          </div>
        </div>
      </section>

      {/* Gallery Section */}
      <section className="section-padding">
        <div className="container-site">
          <SectionTitle 
            title="Genomförda projekt" 
            subtitle="Ett urval av våra tidigare projekt"
            align="center"
          />
          <div className="grid md:grid-cols-3 gap-6 mt-12">
            {galleryImages.map((image, index) => (
              <div 
                key={index} 
                className="aspect-[4/3] rounded-lg overflow-hidden group"
              >
                <img
                  src={image.src}
                  alt={image.alt}
                  className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                />
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Vision Section */}
      <section className="section-padding bg-foreground text-primary-foreground">
        <div className="container-site text-center max-w-3xl mx-auto">
          <h2 className="text-3xl md:text-4xl font-semibold mb-6">
            Bygger för framtiden
          </h2>
          <p className="text-lg opacity-80 mb-8">
            Vi är övertygade om att hållbara byggnader inte bara är bra för miljön 
            – de är också bättre för människorna som arbetar i dem och för 
            företagens långsiktiga lönsamhet.
          </p>
          <a 
            href="mailto:projekt@testforetag.se"
            className="inline-block px-8 py-4 bg-primary-foreground text-foreground font-medium rounded-lg hover:bg-primary-foreground/90 transition-colors"
          >
            Kontakta oss om projektutveckling
          </a>
        </div>
      </section>
    </Layout>
  );
};

export default Projektutveckling;
