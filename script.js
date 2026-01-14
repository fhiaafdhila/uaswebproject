// ==========================
// MAP
// ==========================
var map = L.map('map').setView([5.18, 97.14], 11);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; OpenStreetMap'
}).addTo(map);

// ==========================
// DATA PENDUDUK (BISA DIUBAH)
// ==========================
let dataPenduduk = {
  "Batee": 38540,
  "Delima": 42123,
  "Geumpang": 15420,
  "GlumpangBaro": 27650,
  "GlumpangTiga": 33210,
  "Grong-grong": 18940,
  "IndraJaya": 29760,
  "KembangTanjung": 21453,
  "Keumala": 24130,
  "KotaSigli": 51234,
  "Mane": 13480,
  "Mila": 33450,
  "MuaraTiga": 19870,
  "Mutiara": 36540,
  "MutiaraTimur": 22340,
  "PadangTiji": 28760,
  "PeukanBaro": 26430,
  "Pidie": 40210,
  "Sakti": 17650,
  "SimpangTiga": 29870,
  "Tangse": 12190,
  "Tiro": 34870,
  "Titeue": 25980
};

// ==========================
// WARNA
// ==========================
function getColor(jml) {
  return jml > 70000 ? '#7f0000' :
         jml > 50000 ? '#b30000' :
         jml > 30000 ? '#d7301f' :
         jml > 20000 ? '#fc8d59' :
                       '#fee5d9';
}

let geoLayer;

// ==========================
// STYLE
// ==========================
function style(feature) {
  let nama = feature.properties.NAME_3;
  let jumlah = dataPenduduk[nama] || 0;

  return {
    fillColor: getColor(jumlah),
    weight: 1,
    color: '#000',
    fillOpacity: 0.8
  };
}

// ==========================
// POPUP
// ==========================
function onEachFeature(feature, layer) {
  let nama = feature.properties.NAME_3;
  let jumlah = dataPenduduk[nama] || 0;

  layer.bindPopup(
    "<b>" + nama + "</b><br>Jumlah: " + jumlah
  );
}

// ==========================
// LOAD GEOJSON
// ==========================
fetch('pidie.geojson')
  .then(res => res.json())
  .then(data => {
    geoLayer = L.geoJSON(data, {
      style: style,
      onEachFeature: onEachFeature
    }).addTo(map);

    map.fitBounds(geoLayer.getBounds());
    renderTabel();
  });

// ==========================
// RENDER TABEL
// ==========================
function renderTabel() {
  const tbody = document.querySelector("#tabelData tbody");
  tbody.innerHTML = "";

  for (let kec in dataPenduduk) {
    tbody.innerHTML += `
      <tr>
        <td>${kec}</td>
        <td>${dataPenduduk[kec]}</td>
        <td>
          <button onclick="hapusData('${kec}')">Hapus</button>
        </td>
      </tr>
    `;
  }
}

// ==========================
// TAMBAH / UPDATE
// ==========================
function tambahData() {
  const kec = document.getElementById("kecamatan").value;
  const jml = document.getElementById("jumlah").value;

  if (jml === "") {
    alert("Jumlah belum diisi!");
    return;
  }

  dataPenduduk[kec] = parseInt(jml);
  geoLayer.setStyle(style);
  renderTabel();
}

// ==========================
// HAPUS DATA
// ==========================
function hapusData(kec) {
  if (!confirm("Hapus data " + kec + "?")) return;

  delete dataPenduduk[kec];
  geoLayer.setStyle(style);
  renderTabel();
}
