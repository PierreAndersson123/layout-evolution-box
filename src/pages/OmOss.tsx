import { Layout } from "@/components/layout/Layout";
import { HeroSection } from "@/components/ui/HeroSection";
import { SectionTitle } from "@/components/ui/SectionTitle";
import { Check } from "lucide-react";

import aboutHero from "@/assets/about-hero.jpg";
import officeInterior from "@/assets/office-interior-1.jpg";

const timeline = [
  { year: "1985", title: "Grundandet", description: "Testföretag grundas i Malmö med fokus på lokalt fastighetsägande." },
  { year: "1995", title: "Expansion", description: "Fastighetsbeståndet växer till 10 fastigheter i Malmöregionen." },
  { year: "2005", title: "Hållbarhetsfokus", description: "Vi inleder vår satsning på miljöcertifierade byggnader." },
  { year: "2015", title: "30 år", description: "Vi firar 30 år och har nu över 50 000 kvm under förvaltning." },
  { year: "2024", title: "Idag", description: "Fortsatt utveckling med fokus på moderna, flexibla kontorslösningar." },
];

const workMethods = [
  "Personlig service och tillgänglighet",
  "Långsiktiga hyresgästrelationer",
  "Hållbart fastighetsägande",
  "Flexibla och moderna lokaler",
  "Kontinuerligt underhåll och utveckling",
  "Snabb och professionell respons",
];

const OmOss = () => {
  return (
    <Layout>
      {/* Hero */}
      <HeroSection
        title="Om oss"
        subtitle="Långsiktigt fastighetsägande med lokalt engagemang"
        backgroundImage={aboutHero}
        height="medium"
      />

      {/* Philosophy Section */}
      <section className="section-padding">
        <div className="container-site">
          <div className="grid md:grid-cols-2 gap-12 lg:gap-20">
            <div>
              <SectionTitle title="Vår filosofi" />
              <div className="space-y-4 text-muted-foreground">
                <p>
                  Testföretag är ett lokalt förankrat fastighetsbolag med rötterna 
                  i Malmö sedan 1985. Vår filosofi bygger på långsiktighet, kvalitet 
                  och nära relationer med våra hyresgäster.
                </p>
                <p>
                  Vi tror på att skapa värde genom att investera i våra fastigheter 
                  och erbjuda moderna, attraktiva lokaler som möter dagens krav på 
                  flexibilitet och hållbarhet.
                </p>
              </div>
            </div>
            <div>
              <SectionTitle title="Våra värderingar" />
              <div className="space-y-4 text-muted-foreground">
                <p>
                  <strong className="text-foreground">Långsiktighet</strong> – Vi bygger relationer 
                  som varar. Våra hyresgäster ska känna trygghet i att vi finns här för 
                  dem över tid.
                </p>
                <p>
                  <strong className="text-foreground">Kvalitet</strong> – Vi kompromissar aldrig 
                  med kvaliteten på våra fastigheter eller vår service.
                </p>
                <p>
                  <strong className="text-foreground">Hållbarhet</strong> – Vi tar ansvar för 
                  miljön och arbetar aktivt med att minska vårt klimatavtryck.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Timeline Section */}
      <section className="section-padding bg-muted/30">
        <div className="container-site">
          <SectionTitle 
            title="Vår historia" 
            subtitle="En resa av tillväxt och utveckling sedan 1985"
            align="center"
          />
          <div className="max-w-3xl mx-auto">
            <div className="relative">
              {/* Timeline line */}
              <div className="absolute left-4 md:left-1/2 top-0 bottom-0 w-0.5 bg-border md:-translate-x-0.5" />
              
              {/* Timeline items */}
              <div className="space-y-12">
                {timeline.map((item, index) => (
                  <div 
                    key={item.year}
                    className={`relative flex items-start gap-8 ${
                      index % 2 === 0 ? "md:flex-row" : "md:flex-row-reverse"
                    }`}
                  >
                    {/* Dot */}
                    <div className="absolute left-4 md:left-1/2 w-3 h-3 bg-primary rounded-full -translate-x-1/2 mt-2" />
                    
                    {/* Content */}
                    <div className={`ml-12 md:ml-0 md:w-1/2 ${index % 2 === 0 ? "md:pr-12 md:text-right" : "md:pl-12"}`}>
                      <span className="text-primary font-semibold text-lg">{item.year}</span>
                      <h3 className="text-xl font-semibold mt-1 mb-2">{item.title}</h3>
                      <p className="text-muted-foreground">{item.description}</p>
                    </div>
                  </div>
                ))}
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Work Methods Section */}
      <section className="section-padding">
        <div className="container-site">
          <div className="grid md:grid-cols-2 gap-12 lg:gap-20 items-center">
            <div>
              <SectionTitle title="Vårt arbetssätt" />
              <p className="text-muted-foreground mb-8">
                Vi arbetar för att vara den bästa hyresvärden för våra hyresgäster. 
                Det innebär att vi alltid strävar efter att överträffa förväntningar 
                och leverera service i toppklass.
              </p>
              <ul className="grid gap-3">
                {workMethods.map((method) => (
                  <li key={method} className="flex items-center gap-3">
                    <div className="flex-shrink-0 w-5 h-5 rounded-full bg-primary/10 flex items-center justify-center">
                      <Check size={12} className="text-primary" />
                    </div>
                    <span>{method}</span>
                  </li>
                ))}
              </ul>
            </div>
            <div>
              <img
                src={officeInterior}
                alt="Modern kontorsmiljö"
                className="rounded-lg shadow-lg w-full"
              />
            </div>
          </div>
        </div>
      </section>
    </Layout>
  );
};

export default OmOss;
