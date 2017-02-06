# Fio line formatting  

Struktura záznamu "Data - výpis v Kč"
------------

Byty | Obsah
--- | ---
1 - 3 | "074" = označení typu záznamu "Data - výpis v Kč"
4 - 19 | přidělené č. účtu s vodícími nulami
20 - 39 | 20 alfanumerických znaků zkráceného názvu účtu, doplněných případně mezerami zprava
40 - 45 | datum starého zůstatku ve formátu DDMMRR
46 - 59  | starý zůstatek v haléřích 14 numerických znaků s vodícími nulami
60 | znaménko starého zůstatku, 1 znak "+" či "-"
61 - 74 | nový zůstatek v haléřích 14 numerických znaků s vodícími nulami
75 | znaménko nového zůstatku, 1 znak "+" či "-"
76 - 89 | obraty debet (MD) v haléřích 14 numerických znaků s vodícími nulami
90 | znaménko obratů debet (MD), 1 znak "0" či "-"
91 -104 | obraty kredit (D) v haléřích 14 numerických znaků s vodícími nulami
105  | znaménko obratů kredit (D), 1 znak "0" či "-"
106-108 | pořadové číslo výpisu
109-114 | datum účtování ve formátu DDMMRR
115-128  | (vyplněno 14 znaky mezera z důvodu sjednocení délky záznamů)
129-130  | ukončovací znaky CR a LF

Struktura záznamu "Data - obratová položka v Kč"
------------

Byty | Obsah
--- | --- 
1 - 3 | "075" = označení typu záznamu "Data - obratová položka"
4 - 19 | přidělené číslo účtu 16 numerických znaků s vodícími nulami
20 – 35 | číslo účtu 16 numerických znaků s vodícími nulami (případně v pořadí předčíslí + číslo účtu)
36 – 48 | číslo dokladu 13 numerických znaků
49 – 60 | částka v haléřích 12 numerických znaků s vodícími nulami
61  | kód účtování vztažený k číslu účtu:
62 – 71 | variabilní symbol 10 numerických znaků s vodícími nulami
72 – 81 | konstantní symbol 10 numerických znaků s vodícími nulami ve tvaru BBBBKSYM, kde:
82 – 91 | specifický symbol 10 numerických znaků s vodícími nulami
92 – 97 | "000000" = valuta
98 –117 | 20 alfanumerických znaků zkráceného názvu klienta, doplněno případně mezerami zprava
118 | "0"
119-122 | "0203" = kód měny pro Kč
123-128 | datum splatnosti ve formátu DDMMRR
129-130 | ukončovací znaky CR a LF