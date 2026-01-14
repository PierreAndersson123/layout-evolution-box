import { useState } from "react";
import { Layout } from "@/components/layout/Layout";
import { HeroSection } from "@/components/ui/HeroSection";
import { SectionTitle } from "@/components/ui/SectionTitle";
import { Search, X, MapPin, Square, Building, ArrowUpDown } from "lucide-react";

import premisesHero from "@/assets/premises-hero.jpg";
import premises1 from "@/assets/premises-1.jpg";
import premises2 from "@/assets/premises-2.jpg";
import premises3 from "@/assets/premises-3.jpg";
import property3 from "@/assets/property-3.jpg";
import property4 from "@/assets/property-4.jpg";
import officeInterior1 from "@/assets/office-interior-1.jpg";

const premises = [
  {
    id: 1,
    image: premises1,
    title: "Ljust kontorsrum",
    location: "Malmö Centrum",
    area: "450 m²",
    type: "Kontor",
    price: "1 800 kr/m²/år",
    description: "Nyrenoverat kontorsutrymme med öppen planlösning, stora fönster och industriell känsla. Perfekt för kreativa företag.",
    gallery: [premises1, property3, property4],
    features: ["Fiber", "Kök", "Mötesrum", "Parkering"],
  },
  {
    id: 2,
    image: premises2,
    title: "Modernt kontorshotell",
    location: "Västra Hamnen",
    area: "280 m²",
    type: "Kontorshotell",
    price: "2 200 kr/m²/år",
    description: "Flexibel arbetsplats i moderna lokaler med glaspartitioner och mötesrum. All service inkluderad.",
    gallery: [premises2, officeInterior1],
    features: ["Fiber", "Kök", "Reception", "Mötesrum"],
  },
  {
    id: 3,
    image: premises3,
    title: "Privat kontorsrum",
    location: "Hyllie",
    area: "25 m²",
    type: "Kontor",
    price: "3 500 kr/månad",
    description: "Litet men fullt utrustat kontor för 1-2 personer. Tillgång till gemensamma ytor och konferensrum.",
    gallery: [premises3, premises2],
    features: ["Fiber", "Gemensamt kök", "Konferensrum"],
  },
  {
    id: 4,
    image: officeInterior1,
    title: "Stort kontorslandskap",
    location: "Malmö Centrum",
    area: "850 m²",
    type: "Kontor",
    price: "1 600 kr/m²/år",
    description: "Stort öppet kontor med möjlighet till egen planlösning. Centralt läge med goda kommunikationer.",
    gallery: [officeInterior1, premises1, property3],
    features: ["Fiber", "Kök", "Parkering", "Cykelparkering"],
  },
];

const filterChips = ["Alla", "Kontor", "Kontorshotell", "Under 100 m²", "Över 500 m²"];

interface PremisesModalProps {
  premises: typeof premises[0];
  onClose: () => void;
}

function PremisesModal({ premises, onClose }: PremisesModalProps) {
  const [activeImage, setActiveImage] = useState(0);

  return (
    <div className="fixed inset-0 z-50 flex items-center justify-center p-4 bg-foreground/50">
      <div className="bg-background rounded-lg shadow-xl max-w-4xl w-full max-h-[90vh] overflow-auto">
        {/* Header */}
        <div className="flex items-center justify-between p-6 border-b border-border">
          <div>
            <h2 className="text-2xl font-semibold">{premises.title}</h2>
            <p className="text-primary font-medium">{premises.price}</p>
          </div>
          <button
            onClick={onClose}
            className="p-2 hover:bg-muted rounded-lg transition-colors btn-touch"
            aria-label="Stäng"
          >
            <X size={24} />
          </button>
        </div>

        {/* Gallery */}
        <div className="p-6">
          <div className="aspect-video rounded-lg overflow-hidden mb-4">
            <img
              src={premises.gallery[activeImage]}
              alt={premises.title}
              className="w-full h-full object-cover"
            />
          </div>
          {premises.gallery.length > 1 && (
            <div className="flex gap-2">
              {premises.gallery.map((img, idx) => (
                <button
                  key={idx}
                  onClick={() => setActiveImage(idx)}
                  className={`w-20 h-16 rounded overflow-hidden border-2 transition-colors ${
                    activeImage === idx ? "border-primary" : "border-transparent"
                  }`}
                >
                  <img src={img} alt="" className="w-full h-full object-cover" />
                </button>
              ))}
            </div>
          )}
        </div>

        {/* Details */}
        <div className="p-6 pt-0 space-y-6">
          {/* Meta */}
          <div className="flex flex-wrap gap-4 text-sm">
            <div className="flex items-center gap-1.5">
              <MapPin size={16} className="text-muted-foreground" />
              <span>{premises.location}</span>
            </div>
            <div className="flex items-center gap-1.5">
              <Square size={16} className="text-muted-foreground" />
              <span>{premises.area}</span>
            </div>
            <div className="flex items-center gap-1.5">
              <Building size={16} className="text-muted-foreground" />
              <span>{premises.type}</span>
            </div>
          </div>

          {/* Description */}
          <p className="text-muted-foreground">{premises.description}</p>

          {/* Features */}
          <div>
            <h3 className="font-medium mb-3">Ingår i lokalen</h3>
            <div className="flex flex-wrap gap-2">
              {premises.features.map((feature) => (
                <span key={feature} className="px-3 py-1 bg-muted rounded-full text-sm">
                  {feature}
                </span>
              ))}
            </div>
          </div>

          {/* CTA */}
          <button className="w-full py-3 bg-primary text-primary-foreground font-medium rounded-lg hover:bg-primary/90 transition-colors">
            Boka visning
          </button>
        </div>
      </div>
    </div>
  );
}

const LedigaLokaler = () => {
  const [searchQuery, setSearchQuery] = useState("");
  const [activeFilter, setActiveFilter] = useState("Alla");
  const [sortBy, setSortBy] = useState("default");
  const [selectedPremises, setSelectedPremises] = useState<typeof premises[0] | null>(null);

  const filteredPremises = premises.filter((p) => {
    const matchesSearch = p.title.toLowerCase().includes(searchQuery.toLowerCase()) ||
                         p.location.toLowerCase().includes(searchQuery.toLowerCase());
    
    if (activeFilter === "Alla") return matchesSearch;
    if (activeFilter === "Kontor") return matchesSearch && p.type === "Kontor";
    if (activeFilter === "Kontorshotell") return matchesSearch && p.type === "Kontorshotell";
    if (activeFilter === "Under 100 m²") return matchesSearch && parseInt(p.area) < 100;
    if (activeFilter === "Över 500 m²") return matchesSearch && parseInt(p.area) > 500;
    return matchesSearch;
  });

  const sortedPremises = [...filteredPremises].sort((a, b) => {
    if (sortBy === "area-asc") return parseInt(a.area) - parseInt(b.area);
    if (sortBy === "area-desc") return parseInt(b.area) - parseInt(a.area);
    return 0;
  });

  return (
    <Layout>
      {/* Hero */}
      <HeroSection
        title="Lediga lokaler"
        subtitle="Hitta din nästa lokal bland vårt utbud av moderna kontorslokaler"
        backgroundImage={premisesHero}
        height="medium"
      />

      {/* Search & Filter Section */}
      <section className="py-8 border-b border-border sticky top-16 md:top-20 z-30 bg-background">
        <div className="container-site space-y-4">
          {/* Search Row */}
          <div className="flex flex-col sm:flex-row gap-4">
            <div className="relative flex-1">
              <Search size={20} className="absolute left-4 top-1/2 -translate-y-1/2 text-muted-foreground" />
              <input
                type="text"
                placeholder="Sök lokal eller område..."
                value={searchQuery}
                onChange={(e) => setSearchQuery(e.target.value)}
                className="w-full pl-12 pr-4 py-3 rounded-lg border border-border bg-background focus:outline-none focus:ring-2 focus:ring-primary"
              />
            </div>
            <button 
              onClick={() => setSortBy(sortBy === "area-asc" ? "area-desc" : "area-asc")}
              className="flex items-center gap-2 px-4 py-3 border border-border rounded-lg hover:bg-muted transition-colors"
            >
              <ArrowUpDown size={18} />
              <span className="hidden sm:inline">Sortera efter yta</span>
            </button>
          </div>

          {/* Filter Chips */}
          <div className="flex flex-wrap gap-2">
            {filterChips.map((chip) => (
              <button
                key={chip}
                onClick={() => setActiveFilter(chip)}
                className={`px-4 py-2 rounded-full text-sm font-medium transition-colors ${
                  activeFilter === chip
                    ? "bg-primary text-primary-foreground"
                    : "bg-muted hover:bg-muted/80"
                }`}
              >
                {chip}
              </button>
            ))}
          </div>
        </div>
      </section>

      {/* Results */}
      <section className="section-padding">
        <div className="container-site">
          <SectionTitle 
            title={`${sortedPremises.length} lediga lokaler`}
          />
          
          <div className="space-y-6">
            {sortedPremises.map((p) => (
              <article 
                key={p.id}
                onClick={() => setSelectedPremises(p)}
                className="card-property flex flex-col md:flex-row cursor-pointer group"
              >
                {/* Image */}
                <div className="md:w-72 lg:w-96 flex-shrink-0">
                  <div className="aspect-[4/3] md:aspect-auto md:h-full overflow-hidden">
                    <img
                      src={p.image}
                      alt={p.title}
                      className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                    />
                  </div>
                </div>
                
                {/* Content */}
                <div className="flex-1 p-6 flex flex-col">
                  <div className="flex-1">
                    <div className="flex items-start justify-between gap-4 mb-2">
                      <h3 className="text-xl font-semibold group-hover:text-primary transition-colors">
                        {p.title}
                      </h3>
                      <span className="text-primary font-semibold whitespace-nowrap">
                        {p.price}
                      </span>
                    </div>
                    <p className="text-muted-foreground mb-4 line-clamp-2">
                      {p.description}
                    </p>
                  </div>
                  
                  {/* Meta */}
                  <div className="flex flex-wrap items-center gap-4 text-sm text-muted-foreground">
                    <div className="flex items-center gap-1.5">
                      <MapPin size={16} />
                      <span>{p.location}</span>
                    </div>
                    <div className="flex items-center gap-1.5">
                      <Square size={16} />
                      <span>{p.area}</span>
                    </div>
                    <div className="flex items-center gap-1.5">
                      <Building size={16} />
                      <span>{p.type}</span>
                    </div>
                  </div>
                </div>
              </article>
            ))}
          </div>

          {sortedPremises.length === 0 && (
            <div className="text-center py-16">
              <p className="text-muted-foreground">Inga lokaler matchar din sökning.</p>
            </div>
          )}
        </div>
      </section>

      {/* Premises Modal */}
      {selectedPremises && (
        <PremisesModal
          premises={selectedPremises}
          onClose={() => setSelectedPremises(null)}
        />
      )}
    </Layout>
  );
};

export default LedigaLokaler;
