import { Link } from "react-router-dom";

interface CTABandProps {
  title: string;
  subtitle?: string;
  ctaLabel: string;
  ctaHref: string;
  backgroundImage: string;
}

export function CTABand({
  title,
  subtitle,
  ctaLabel,
  ctaHref,
  backgroundImage,
}: CTABandProps) {
  return (
    <section className="cta-band">
      {/* Background Image */}
      <img
        src={backgroundImage}
        alt=""
        className="absolute inset-0 w-full h-full object-cover"
        loading="lazy"
      />
      
      {/* Overlay */}
      <div className="cta-overlay" />
      
      {/* Content */}
      <div className="relative z-10 container-site text-center">
        <h2 className="text-3xl md:text-4xl font-semibold text-primary-foreground mb-4">
          {title}
        </h2>
        {subtitle && (
          <p className="text-lg text-primary-foreground/80 mb-8 max-w-2xl mx-auto">
            {subtitle}
          </p>
        )}
        <Link
          to={ctaHref}
          className="inline-block px-8 py-4 bg-primary-foreground text-foreground font-medium rounded-lg hover:bg-primary-foreground/90 transition-colors btn-touch"
        >
          {ctaLabel}
        </Link>
      </div>
    </section>
  );
}
