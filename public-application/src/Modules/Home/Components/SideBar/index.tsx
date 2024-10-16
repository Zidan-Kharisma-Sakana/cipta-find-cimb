import { CategoryInput, LocationQueryInput, NearestLocationInput, SearchQueryInput } from "./input";
import CIMB from "../../../../assets/cimb-general.svg";
const SideBarHome: React.FC = () => {
  return (
    <aside className="bg-white border p-8 border-r w-full md:w-1/2 xl:w-1/3">
      <div>
        <div className="relative overflow-x-hidden">
          <h4 className="text-cimbPrimary font-bold text-2xl">Niaga Nearby</h4>
          <p className="text-cimbSecondary300 font-medium">Cara Praktis cari Kantor & ATM CIMB Niaga</p>
          <div className="absolute right-0 top-1/2 -translate-y-1/2 z-10 h-[100px] bg-white flex">
            <div id="this" />
          </div>
          <div className="absolute w-full left-0 h-[80px] top-1/2 -translate-y-1/2 z-20">
            <img id="that" className="absolute right-full top-0" src={CIMB} />
          </div>
        </div>
      </div>
      <div id="bod" className="w-full mt-16">
        <div className="mt-8 relative overflow-hidden w-full rounded-full grid grid-cols-2 text-center ring-2 ring-cimbPrimary py-2 cursor-pointer font-bold">
          <p className="relative z-20 text-white">Kantor CIMB</p>
          <p className="text-cimbPrimary relative z-20">ATM CIMB</p>
          <div className="absolute left-0 top-0 h-full w-1/2 bg-cimbSecondary300 z-10 rounded-full"></div>
        </div>
        <div className="mt-8 grid grid-cols-1 gap-y-2">
          <SearchQueryInput />
          <LocationQueryInput />
          <CategoryInput />
        </div>
        <div className="grid grid-cols-5 items-center text-center my-8">
          <div className="col-span-2 border border-cimbSecondary100" />
          <div className="text-cimbPrimary">Atau</div>
          <div className="col-span-2 border border-cimbSecondary100" />
        </div>
        <NearestLocationInput />
      </div>
    </aside>
  );
};

export default SideBarHome;
