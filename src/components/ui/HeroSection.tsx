import { Link } from "react-router-dom";

interface HeroSectionProps {
  title: string;
  subtitle?: string;
  backgroundImage: string;
  primaryCta?: {
    label: string;
    href: string;
  };
  secondaryCta?: {
    label: string;
    href: string;
  };
  height?: "full" | "medium" | "short";
}

export function HeroSection({
  title,
  subtitle,
  backgroundImage,
  primaryCta,
  secondaryCta,
  height = "full",
}: HeroSectionProps) {
  const heightClasses = {
    full: "min-h-[70vh] md:min-h-[80vh]",
    medium: "min-h-[50vh] md:min-h-[60vh]",
    short: "min-h-[40vh] md:min-h-[50vh]",
  };

  return (
    <section className={`relative flex items-center justify-center overflow-hidden ${heightClasses[height]}`}>
      {/* Background Image */}
      <img
        src={backgroundImage}
        alt=""
        className="absolute inset-0 w-full h-full object-cover"
        loading="eager"
      />
      
      {/* Overlay */}
      <div className="hero-overlay" />
      
      {/* Content */}
      <div className="hero-content max-w-4xl mx-auto">
        <h1 className="text-4xl md:text-5xl lg:text-6xl font-semibold mb-4 md:mb-6 animate-fade-in text-balance">
          {title}
        </h1>
        {subtitle && (
          <p className="text-lg md:text-xl opacity-90 mb-8 max-w-2xl mx-auto animate-fade-in" style={{ animationDelay: "0.1s" }}>
            {subtitle}
          </p>
        )}
        {(primaryCta || secondaryCta) && (
          <div className="flex flex-col sm:flex-row items-center justify-center gap-4 animate-fade-in" style={{ animationDelay: "0.2s" }}>
            {primaryCta && (
              <Link
                to={primaryCta.href}
                className="px-8 py-4 bg-primary-foreground text-foreground font-medium rounded-lg hover:bg-primary-foreground/90 transition-colors btn-touch"
              >
                {primaryCta.label}
              </Link>
            )}
            {secondaryCta && (
              <Link
                to={secondaryCta.href}
                className="px-8 py-4 border-2 border-primary-foreground text-primary-foreground font-medium rounded-lg hover:bg-primary-foreground/10 transition-colors btn-touch"
              >
                {secondaryCta.label}
              </Link>
            )}
          </div>
        )}
      </div>
    </section>
  );
}
