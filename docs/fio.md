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
