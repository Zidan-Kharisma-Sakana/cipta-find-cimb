import { CategoryInput, LocationQueryInput, NearestLocationInput, SearchQueryInput, TypeQueryInput } from "./input";
import CIMB from "../../../../assets/cimb-general.svg";
import { Card } from "./card";
import { useFilter } from "../../../../Utils/useFilter";
const SideBarHome: React.FC = () => {
  const { data, type } = useFilter();
  return (
    <aside className="bg-white border p-8 border-r w-full md:w-1/2 xl:w-1/3">
      <div>
        <div className="relative overflow-hidden">
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
      <div id="bod" className="w-full my-8">
        <TypeQueryInput />
        <div className="mt-8 grid grid-cols-1 gap-y-2">
          {type === "office" && <SearchQueryInput />}
          <LocationQueryInput />
          {type === "office" && <CategoryInput />}
        </div>
        <div className="grid grid-cols-5 items-center text-center my-8">
          <div className="col-span-2 border border-cimbSecondary100" />
          <div className="text-cimbPrimary">Atau</div>
          <div className="col-span-2 border border-cimbSecondary100" />
        </div>
        <NearestLocationInput />
      </div>
      <div className="grid grid-cols-1 gap-y-4">
        {data.map((branch) => (
          <Card key={`branch-${type}-${branch.id}`} data={branch} />
        ))}
      </div>
    </aside>
  );
};

export default SideBarHome;
