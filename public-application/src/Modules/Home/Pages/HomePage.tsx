import { FilterProvider } from "../../../Utils/useFilter";
import { useIsMobile } from "../../../Utils/useIsMobile";
import { useSidebar } from "../../../Utils/useSideBar";
import HomeLayout from "../../Layout/HomeLayout";
import MapHomeContainer from "../Components/Map";
import SideBarHome from "../Components/SideBar";

function Home() {
  const { isOpen } = useSidebar();
  const isMobile = useIsMobile();
  if (isMobile) {
    return <SideBarHome />;
  }
  if (isOpen) {
    return (
      <div className="flex w-full">
        <SideBarHome />
        <MapHomeContainer />
      </div>
    );
  }
  return <MapHomeContainer />;
}
export default function HomePage() {
  return (
    <HomeLayout home>
      <FilterProvider>
        <Home />
      </FilterProvider>
    </HomeLayout>
  );
}
