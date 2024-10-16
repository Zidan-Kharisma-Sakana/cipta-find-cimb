import HomeLayout from "../../Layout/HomeLayout";
import MapDetailContainer from "../Components/Map";
import SideBarDetail from "../Components/SideBar";

function Detail() {
  return (
    <section className="w-full flex flex-col-reverse md:flex-row">
      <SideBarDetail data={null} />
      <MapDetailContainer />
    </section>
  );
}
export default function DetailPage() {
  return (
    <HomeLayout>
      <Detail />
    </HomeLayout>
  );
}
