import Info from './Info';

const InfoBox = () => {
    return (
        <>
            <div className="grid grid-cols-2 mt-6 gap-y-6">
            <Info title="Provinsi" value="Jawa Timur"/>
            <Info title="Kota/Kabupatan" value="Surabaya"/>
            <div className="col-span-2">
              <Info title="Alamat"value="Jalan Kemenangan no 31, Kel. Huhuhaha Kec. heheh"/>
            </div>
            <Info title="Jam Operasional" value="08.00-17.00"/>
          </div>
        </>
    )
}

export default InfoBox;