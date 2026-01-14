import { Link } from "react-router-dom";
import { Layout } from "@/components/layout/Layout";
import { HeroSection } from "@/components/ui/HeroSection";
import { PropertyCard } from "@/components/ui/PropertyCard";
import { CTABand } from "@/components/ui/CTABand";
import { SectionTitle } from "@/components/ui/SectionTitle";
import { ArrowRight } from "lucide-react";

import heroImage from "@/assets/hero-facade.jpg";
import officeInterior from "@/assets/office-interior-2.jpg";
import projectImage from "@/assets/project-hero.jpg";
import ctaBackground from "@/assets/cta-background.jpg";
import property1 from "@/assets/property-1.jpg";
import property2 from "@/assets/property-2.jpg";
import property3 from "@/assets/property-3.jpg";
import property4 from "@/assets/property-4.jpg";

const featuredProperties = [
  {
    image: property1,
    title: "Centrum Plaza",
    location: "Malmö Centrum",
    area: "2 500 m²",
    type: "Kontor",
  },
  {
    image: property2,
    title: "Industrigatan 8",
    location: "Västra Hamnen",
    area: "1 800 m²",
    type: "Kontor & Butik",
  },
  {
    image: property3,
    title: "Parkvillan",
    location: "Limhamn",
    area: "3 200 m²",
    type: "Kontor",
  },
  {
    image: property4,
    title: "Eco Business Center",
    location: "Hyllie",
    area: "4 100 m²",
    type: "Kontor",
  },
];

const Index = () => {
  return (
    <Layout>
      {/* Hero Section */}
      <HeroSection
        title="Testföretag"
        subtitle="Långsiktigt fastighetsägande och utveckling i Malmöregionen sedan 1985"
        backgroundImage={heroImage}
        primaryCta={{ label: "Se lediga lokaler", href: "/lediga-lokaler" }}
        secondaryCta={{ label: "Läs mer om oss", href: "/om-oss" }}
      />

      {/* Intro Section */}
      <section className="section-padding">
        <div className="container-site">
          <div className="grid md:grid-cols-2 gap-12 lg:gap-20 items-center">
            <div>
              <SectionTitle 
                title="Långsiktigt fastighetsägande i Malmö" 
              />
              <div className="space-y-4 text-muted-foreground">
                <p>
                  Sedan starten 1985 har Testföretag utvecklats till en av Malmöregionens 
                  mest etablerade fastighetsägare. Vi förvaltar och utvecklar kommersiella 
                  fastigheter med fokus på långsiktiga relationer och hållbar tillväxt.
                </p>
                <p>
                  Vår filosofi bygger på att skapa moderna, flexibla lokaler som möter 
                  dagens krav på arbetsmiljö och hållbarhet. Vi tror på nära samarbeten 
                  med våra hyresgäster och en personlig service som gör skillnad.
                </p>
                <p>
                  Med ett fastighetsbestånd som spänner över kontor, handel och 
                  logistik erbjuder vi lösningar för företag i alla storlekar.
                </p>
              </div>
              <Link 
                to="/om-oss" 
                className="inline-flex items-center gap-2 mt-8 text-primary font-medium hover:gap-3 transition-all"
              >
                Läs mer om oss <ArrowRight size={18} />
              </Link>
            </div>
            <div className="relative">
              <img
                src={officeInterior}
                alt="Modern kontorsinteriör"
                className="rounded-lg shadow-lg w-full"
              />
            </div>
          </div>
        </div>
      </section>

      {/* Featured Properties */}
      <section className="section-padding bg-muted/30">
        <div className="container-site">
          <div className="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-12">
            <SectionTitle 
              title="Utvalda fastigheter" 
              subtitle="Upptäck vårt varierade fastighetsbestånd i Malmöregionen"
            />
            <Link 
              to="/fastigheter" 
              className="inline-flex items-center gap-2 text-primary font-medium hover:gap-3 transition-all shrink-0"
            >
              Se alla fastigheter <ArrowRight size={18} />
            </Link>
          </div>
          <div className="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            {featuredProperties.map((property) => (
              <PropertyCard key={property.title} {...property} />
            ))}
          </div>
        </div>
      </section>

      {/* Project Highlight */}
      <section className="section-padding">
        <div className="container-site">
          <div className="grid md:grid-cols-2 gap-12 lg:gap-20 items-center">
            <div className="order-2 md:order-1">
              <img
                src={projectImage}
                alt="Projektutveckling i Malmö"
                className="rounded-lg shadow-lg w-full"
              />
            </div>
            <div className="order-1 md:order-2">
              <SectionTitle 
                title="Projektutveckling" 
              />
              <div className="space-y-4 text-muted-foreground">
                <p>
                  Vi utvecklar nya fastigheter som möter morgondagens behov. 
                  Med fokus på hållbarhet, flexibilitet och modern arkitektur 
                  skapar vi attraktiva miljöer för framtidens företag.
                </p>
                <p>
                  Våra projekt kännetecknas av hög kvalitet, genomtänkt planering 
                  och ett långsiktigt perspektiv. Vi tar ansvar från idé till 
                  färdig fastighet.
                </p>
              </div>
              <Link 
                to="/projektutveckling" 
                className="inline-flex items-center gap-2 mt-8 text-primary font-medium hover:gap-3 transition-all"
              >
                Läs om projektutveckling <ArrowRight size={18} />
              </Link>
            </div>
          </div>
        </div>
      </section>

      {/* CTA Band */}
      <CTABand
        title="Letar du efter lokal?"
        subtitle="Vi hjälper dig att hitta den perfekta lokalen för ditt företag"
        ctaLabel="Se lediga lokaler"
        ctaHref="/lediga-lokaler"
        backgroundImage={ctaBackground}
      />
    </Layout>
  );
};

export default Index;
