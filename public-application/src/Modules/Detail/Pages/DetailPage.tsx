import CIMB from "../../Layout/CIMB";

export default function DetailPage() {
  return (
    <main>
      <div className="w-full flex justify-between px-6 py-4 fixed border z-10 bg-gradient-to-r from-cimbSecondary200 to-cimbSecondary300">
        <div>
        </div>
        <CIMB />
      </div>
      <section className="w-full">
        <div>
          Home
        </div>
      </section>
    </main>
  );
}
