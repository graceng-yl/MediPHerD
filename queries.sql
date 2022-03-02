DROP DATABASE IF EXISTS medipherd;
CREATE DATABASE medipherd;

DROP TABLE IF EXISTS keywords_relation;
DROP TABLE IF EXISTS materials_relation;
DROP TABLE IF EXISTS materials;
DROP TABLE IF EXISTS keywords;
DROP TABLE IF EXISTS plants;

CREATE TABLE plants(
	plant_id CHAR(4) NOT NULL,
    plant_name VARCHAR(30) NOT NULL,
    plant_othernames VARCHAR(120),
    plant_family VARCHAR(20),
    plant_genus VARCHAR(20),
    plant_species VARCHAR(20),
    plant_chemconst VARCHAR(1000),
    plant_usage VARCHAR(1000),
    plant_refs VARCHAR(1000),
    PRIMARY KEY (plant_id)
);
CREATE TABLE materials(
	mat_id CHAR(3) NOT NULL,
    mat_desc VARCHAR(20),
    PRIMARY KEY (mat_id)
);
CREATE TABLE keywords(
    keyw_id CHAR(4) NOT NULL,
    keyw_desc VARCHAR(30),
    PRIMARY KEY (keyw_id)
);
CREATE TABLE materials_relation(
    rid_mat int AUTO_INCREMENT,
    plant_id CHAR(4),
    mat_id CHAR(3),
    PRIMARY KEY (rid_mat),
    FOREIGN KEY (plant_id) REFERENCES plants(plant_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (mat_id) REFERENCES materials(mat_id) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE keywords_relation(
    rid_keyw int AUTO_INCREMENT,
    plant_id CHAR(4),
    keyw_id CHAR(4),
    PRIMARY KEY (rid_keyw),
    FOREIGN KEY (plant_id) REFERENCES plants(plant_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (keyw_id) REFERENCES keywords(keyw_id) ON DELETE CASCADE ON UPDATE CASCADE
);


INSERT INTO plants(plant_id, plant_name, plant_othernames, plant_family, plant_genus, plant_species, plant_usage, plant_chemconst, plant_refs) VALUES
("P001", "Akar Seratus", "Derhaka Mentua, Bujang Hilir, China Lily", "Asparagaceae", "Peliosanthes", "teta", "The roots boil to treat ‘sembelit’, abortion, anti inflammatory, stamina, cough, bronchitis, colic, scabies. Also used as post natal tonic (aphrodisiac) and family planning.", "-", "http://www.theplantlist.org/tpl/record/kew-311498-MEDIPHERD-http://bayulestari.blogspot.com/p/taman-herba.html"),
("P002", "Belimbing Tanah", "White Bat Plant, Janggut Adam", "Dioscoreaceae", "Tacca", "integrifolia", "It has been used for treatment of gastric ulcer, enteritis, hepatitis, controlling blood pressure, improving sexual fuction, treatment of skin abrasion, skin diseases, and various kind of cancers.", "diarylheptanoids, ochratoxin A, amino acids, n-triacontanol, castanogenin, betulinic acid, quercetin-3-a-arabinodise, taccalin, taccalonolides", "https://pubmed.ncbi.nlm.nih.gov/18209708/-MEDIPHERD-https://rdo.psu.ac.th/sjstweb/journal/27-2/06Taccaintegrifolia.pdf-MEDIPHERD-https://pubmed.ncbi.nlm.nih.gov/20232323/"),
("P003", "Belalai Gajah", "Snake Grass, Sabah Snake Grass, Gendis, She Cao, Phaya plongton", "Acanthaceae", "Clinacanthus", "nutans", "This species has attracted public interest recently due to its high medicinal values for the treatment of cancer, inflammation and various skin problems. The whole plant is used medicinally to regulate menstrual function, reduce swelling, remove blood clots, relieve pain, to set a broken bone, treat injuries from falls, fractures, contusion, strains, anaemia, jaundice, rheumatism, eye diseases. Fresh leaves have long been traditionally used in Thailand as an anti-inflammatory drug to treat insect and snake bite, skin rashes, allergic responses, herpes simple virus (HSV) and varicella-zoster virus (VZV) lesions.", "stigma sterol, lupeol, B-sitosterol, chlorophyll derivatives, sulfur containing glycosides, C-glycosyl flavones, cerebroside and a monoacylmonogalatosylglycerol", "https://pubmed.ncbi.nlm.nih.gov/23533485/-MEDIPHERD-https://pubmed.ncbi.nlm.nih.gov/8876301/-MEDIPHERD-https://ijpsr.com/bft-article/acute-oral-toxicity-study-of-clinacanthus-nutans-in-mice/-MEDIPHERD-https://www.actahort.org/books/680/680_18.htm"),
("P004", "Ati-ati", "Flame nettle, painted nettle, mayana", "Lamiaceae", "Coleus", "blumei", "Primarily used for pain, sore, swelling and cuts and in other instances as adjunct medication for delayed menstruation and diarrhea.", "alkaloids, saponins, flavonoids, tannin, volatile oil, quercetin", "http://www.tandfonline.com/doi/pdf/10.1080/15226514-MEDIPHERD-https://pubmed.ncbi.nlm.nih.gov/11456107/-MEDIPHERD-https://www.herbanext.com/philippine-medicinal-herbs/mayana"),
("P005", "Alamanda", "Golden trumpet vine, Yellow Bell, Huang ying", "Apocynaceae", "Allamanda", "cathartica", "In Suriname’s traditional medicinec the roots are used against juandice, complication with malarian and enlarged spleen. The flowers act as a laxative and antibiotic against Staphyloccus spp, and malaria. In Guiana, the latex is used as a purgative and employed for colic. In Surinam, the plant is used as a cathartic (http://stuartxchange. com/Kampanilya.html). Leaves used as purgative or emetic in Southeast Asia. Leaves are also used as an antidote, and for relieving coughs and headaches.", "alkaloids, flavonoids, saponins, carbohydrates, allamandin, 7-Methyl-5,9-octadecadienoic acid", "http://informahealthcare.com/doi/abs/10.3109/13880209209054001-MEDIPHERD-http://www.ncbi.nlm.nih.gov/pmc/articles/PMC1456996-MEDIPHERD-http://www.ces.ncsu.edu/depts/hort/consumer/poison/Allamca.htm-MEDIPHERD-http://books.google.com.my/Allamanda-MEDIPHERD-http://www.fs.fed.us/global/iitf/pdf/shrubs/Allamanda%20cathartica.pdf-MEDIPHERD-http://stuartxchange.com/Kampanilya.html-MEDIPHERD-http://informahealthcare.com/doi/abs/10.3109/13880209209054001-MEDIPHERD-http://onlinelibrary.wiley.com/doi/10.1111/j.1439-0272.2008.00866.x/pdf-MEDIPHERD-https://www.ipindexing.com/article/12352"),
("P006", "Bangun Bangun", "Indian mint, Indian Borage, Spanish thyme, Karpuravalli", "Lamiaceae", "Plectranthus", "amboinuicus", "Used to treat malarial fever, hepatopathy, renal and vesical calculi, cough, chronic asthma, hiccough, bronchitis, helminthiasis, colic, convulsions, epilepsy, skin ulcerations, scorpion bite, skin allergy, wounds, diarrhoea, promote liver health, stimulate lactation for the month or so following childbirth.", "2alpha,3alpha,19alpha,23-Tetrahydroxyursolic-Acid, 2alpha,3alpha-Dihydroxyoleanolic-Acid, Alpha-Thujene, Crategolic-Acid, Euscaphic-Acid, Kilocalories, Tomentic-Acid, Ursolic-Acid, Oleanolic-Acid, Ascorbic-Acid, Ash, Beta-Carotene, Calcium, Carbohydrates, Chrysoeriol, Fat, Fiber, Iron, Niacin, Oxalic-Acid,Phosphorus, Pomolic-Acid, Protein, Riboflavin, Thiamin, Carvacrol", "-"),
("P007", "Jarum Tujuh Bilah", "Leaf cactus, rose cactus, wax rose, Cak Sing Cam, Qi Xing Zhen", "Cactaceae", "Pereskia", "bleo", "The leaves either eaten raw, chewed or taken as a concoction brewed and drink as a tea made from the mature leaves (6–7 pieces) is claimed to treat diabetes, hypertension, rheumatism and for revitalizing the body.It also used as remedies for the relief of headache, gastric pain, ulcers, hemorrhoids, atopic dermatitis. There are also claims that the regular consumption of these leaves can be used to prevent and treat cancer.", "Secondary metabolites with versatile phramcological activities. These compounds include flavanoids, phenols,phenolic glycosides, saponins, cyanogenic glycosides, unsaturated lactones and glucosinolates.", "-"),
("P008", "Halia Bara", "Halia udang, halia merah", "Zingiberaceae", "Zingiber", "officinale", "Rhizole for treating stomach discomfort, tumours, relieving rheumatic pains and as post partum medicine", "The leaf oil was clearly dominated by β-caryophyllene (31.7%), while the oil from the rhizomes was predominantly monoterpenoid, with camphene (14.5%), geranial (14.3%), and geranyl acetate (13.7%) the three most abundant constituents.", "http://umrefjournal.um.edu.my/public/article-view.php-MEDIPHERD-https://qmro.qmul.ac.uk/xmlui/handle/123456789/3350-MEDIPHERD-http://www.ukm.my/mjas/v12_n3/html/12_3_18.html-MEDIPHERD-https://www.thieme-connect.com/ejournals/abstract/10.1055/s-0029-1234377"),
("P009", "Capa Merah", "Sembung, Blumea camphor, Ai na xiang", "Compositae", "Blumea", "balsamifera", "To treat internal wound, rheumatism, hypertension, kidney stones, wounds and cuts, anti-diarrhea, anti spasms, colds and coughs and hypertension", "Flavanoids, terpenes, lactones, Blumealactone A,B,C. Volatile oil contitients were borneol (33.22 %), caryophyllene (8.24 %), ledol (7.12%), tetracyclo [6,3,2,0,(2.5).0(1,8) tridecan-9-ol, 4,4-dimethyl (5.18%), phytol(4.63%), caryophyllene oxide(4.07%), guaiol (3.44%), thujopsene-13 (4.42%), dimethoxydurene (3.59%) and γ-eudesmol (3.18%)", "http://www.banglajol.info/bd/index.php/BJB/article/viewArticle/5132-MEDIPHERD-http://www.worldscientific.com/doi/abs/10.1142/S0192415X09007326"),
("P010", "Gaharu", "Agarwood, Eagle's wood, Aloe wood, Agaru", "Thymelaeaceae", "Aquilaria", "agallocha", "To treat inflammation, arthritis, vomiting, cardiac disorders, cough, asthma, leprosy, anorexia, headache and gout.", "Leaf and bark methanol extracts contain alkaloids, anthroquinones, triterpenoids, tannins, fixed oils and fats and glycosides whereas saponins, fixed oils and fats, alkaloids and triterpenoids were found in the aqueous extracts.The oil contained octacosane, naphthalene, caryophyllene oxide, cadinene", "http://www.banglajol.info/bd/index.php/BJP/article/viewArticle/851-MEDIPHERD-http://www.ajol.info/index.php/ajb/article/view/59366-MEDIPHERD-http://www.sciencedirect.com/science/article/-MEDIPHERD-http://eds.b.ebscohost.com/ehost/-MEDIPHERD-http://www.ijbmsp.org/index.php/IJBMSP/article/view/5-MEDIPHERD-http://saspublisher.com/wp-content/uploads/2013/02/SJAMS-119-12.pdf"),
("P011", "Cabai Emas", "Snake Jasmine, Dainty Spurs", "Acanthaceae", "Rhinacanthus", "nasutus", "In Thai folk remedy, the docoction of roots or whole plant is drunk for treatment of cancer. The plant also used for treatment of ringworm and skin deseases.", "Rhinacanthin C, flavonoids, anthraquinones, tritepenes, sterol, naphthoquinones", "http://www.ijrpc.com/files/29-3144.pdf-MEDIPHERD-http://idosi.org/larcji/1(5)10/8.pdf-MEDIPHERD-http://astp.jst.go.jp/modules/-MEDIPHERD-http://www.pharmacy.mahidol.ac.th/mujournal"),
("P012", "Bunga Telang", "Asian pigeonwings, bluebellvine, blue pea, butterfly pea, cordofan pea, Darwin pea", "Fabaceae", "Clitoria", "ternatea", "promote memory and inteligence, cure insect bites, skin diseases, infections of eye, and entire plant is used as antidote for snake bites. The roots are most widely used and are bitter, refrigerant, laxative, intellect promoting, diuretic, antihelmintic and tonic and are useful in dementia, hemicrania, burning sensation, leprosy, inflammation, leucoderma, bronchitis, asthma, pulmonary tuberculosis, ascites and fever. The seeds are cathartic, while the leaves are used in otalgia and hepatopathy.", "Total plant protein ranges from 14-20 %. The petroleum ether (60-80°C) flower extracts reveals the presence of Taraxerol, a pentacyclic triterpenoid. Flowers contain of steroids, triterpenoid, saponins, resins, tannins and starch in petroleum ether (60-80°C).", "-"),
("P013", "Bunga Raya", "Bunga sepatu, kembang sepatu, rose mallow, chinese hibiscus, china rose, shoe flower", "Malvaceae", "Hibiscus", "rosa-sinensis", "Traditionally, the leaves of the plant are believed to cure fatigue and skin diseases. Flowers are used in epilepsy, leprosy, bronchial catarrh and diabetes. Fresh root juices are used to treat gonorrhea and the powdered root for menorrhagia. The root is also traditionally used to treat coughs.", "Leaves and stems: stigmasterol, β-sitosterol, taraxeryl acetate, cyanidin diglucoside, flavonoids, vitamins, thiamine, fiboflavin, niacin, ascorbic acid; Flowers (yellow colour flowers): quercetin-3-diglucoside, 3,7-diglucoside, cyanidin-3,5-diglucoside, cyanidin-3-sophoroside-5-glucoside; Flowers (ovary of white flowers): quercetin-3-diglucoside, 3,7-diglucoside, cyanidin-3,5-diglucoside, cyanidin-3-sophoroside-5-glucoside, kaempferol-3-xylosylglucoside", "http://www.health-from-nature.net/Hibiscus.html-MEDIPHERD-http://en.wikipedia.org/wiki/Hibiscus_rosa-sinensis"),
("P014", "Bismillah", "Bitter leaf, Vernonia Tree, Pokok Afrika", "Acanthaceae", "Vernonia", "amygdalina", "The plant used as tonic, control of cough, feverish condition, constipation and hypertension", "Saponin, sesquiterpene, flavonoids, Steroid glycosides-type vernoiside B1.", "http://www.ncbi.nlm.nih.gov/pmc/articles/PMC2464769/-MEDIPHERD-http://eujournal.org/index.php/esj/article/view/1955-MEDIPHERD-http://www.medwelljournals.com/abstract/?doi=rjpharm.2013.7.11-MEDIPHERD-http://www.sjournals.com/index.php/SJBS/article/view/596-MEDIPHERD-http://eds.a.ebscohost.com/ehost/pdfviewer/-MEDIPHERD-http://www.fao.org/livestock/agap/frg/Visit/Ida/Vernonia%20amygdalina.htm"),
("P015", "Bunga Melur", "Jasmine, Bunga Melati", "Oleaceae", "Jasminum", "sambac", "Flowers and leaves are largely used to prevent and treat breast cancer and stopping uterine bleeding. Reduce the shortness of breath and as treatment of acne. Root is used to treat headace and insomnia and is believed can accelerate fracture healing. Essential oil is used as fregrance for skin care products as it tones the skin as well as reduces skin infalmmation.", "Chemical constitutents in root are dotriacontanoic acid, dotriacontanol, oleanolic acid, daucosterol and hesperidin. Linalyl β-d-glucopyranoside and its 6′-O-malonate were isolated as aroma precursors of linalool from flower buds of Jasminum sambac guided by enzymatic hydrolysis followed by GC and GC-MS analyses", "http://www.researchgate.net/publication/43120136-MEDIPHERD-http://www.hindawi.com/journals/ecam/2012/786426/-MEDIPHERD-http://www.ncbi.nlm.nih.gov/pmc/articles/PMC3320082/pdf/ECAM2012-471312.pdf-MEDIPHERD-http://europepmc.org/abstract/MED/15706849-MEDIPHERD-http://www.sciencedirect.com/science/article/pii/0031942294E0200C-MEDIPHERD-http://en.wikipedia.org/wiki/Jasminum_sambac"),
("P016", "Bisa Ular", "Hophead, hop-headed barleria", "Acanthaceae", "Barleria", "lupulina", "To treat poisonous bites, externally used as an antiinflammatory for insect bite, herpes simplex and herpes zoster. Treatment of rheumatoid arthritis, relieve mental tension and disturbance, treatment of diabetes.", "From the aerial part of Barleria lupulina, 8-O-acetyl-6-O-trans-p-coumaroylshanzhiside, saletpangponosides A–C and 8-O-acetylmussaenoside were isolated together with 13 known compound, Iridoid glucosides. The leaf and stem contain alkaloid.", "http://www.globinmed.com/index.php?option=com_content&view=article&id=79313:barleria");

INSERT INTO materials(mat_id, mat_desc) VALUES
("M01", "Flower"),
("M02", "flower buds"),
("M03", "latex"),
("M04", "Leaves"),
("M05", "oil"),
("M06", "pods"),
("M07", "Rhizome"),
("M08", "Roots"),
("M09", "whole"),
("M10", "wood");

INSERT INTO keywords(keyw_id, keyw_desc) VALUES
("K001", "acne"),
("K002", "allergy"),
("K003", "anti-inflammatory"),
("K004", "arthritis"),
("K005", "asthma"),
("K006", "bites"),
("K007", "blood pressure"),
("K008", "cancer"),
("K009", "constipation"),
("K010", "cough"),
("K011", "diabetes"),
("K012", "family planning"),
("K013", "fever"),
("K014", "headache"),
("K015", "hypertension"),
("K016", "jaundice"),
("K017", "kidney"),
("K018", "malaria"),
("K019", "Memory"),
("K020", "menstrual"),
("K021", "pain"),
("K022", "rheumatism"),
("K023", "sexual function"),
("K024", "skin"),
("K025", "stomach"),
("K026", "swelling"),
("K027", "tumours"),
("K028", "ulceration");

INSERT INTO materials_relation(plant_id, mat_id) VALUES
("P005","M01"),
("P012","M01"),
("P015","M01"),
("P015","M02"),
("P005","M03"),
("P003","M04"),
("P004","M04"),
("P005","M04"),
("P006","M04"),
("P007","M04"),
("P009","M04"),
("P014","M04"),
("P016","M04"),
("P010","M05"),
("P012","M06"),
("P002","M07"),
("P008","M07"),
("P001","M08"),
("P005","M08"),
("P009","M08"),
("P011","M08"),
("P007","M09"),
("P011","M09"),
("P013","M09"),
("P010","M10");

INSERT INTO keywords_relation(plant_id, keyw_id) VALUES
("P015","K001"),
("P006","K002"),
("P001","K003"),
("P003","K003"),
("P010","K003"),
("P010","K004"),
("P016","K004"),
("P010","K005"),
("P012","K006"),
("P016","K006"),
("P002","K007"),
("P002","K008"),
("P003","K008"),
("P007","K008"),
("P011","K008"),
("P015","K008"),
("P014","K009"),
("P001","K010"),
("P005","K010"),
("P013","K010"),
("P014","K010"),
("P007","K011"),
("P013","K011"),
("P001","K012"),
("P006","K013"),
("P015","K014"),
("P007","K015"),
("P009","K015"),
("P014","K015"),
("P005","K016"),
("P009","K017"),
("P005","K018"),
("P012","K019"),
("P004","K020"),
("P004","K021"),
("P008","K022"),
("P009","K022"),
("P016","K022"),
("P002","K023"),
("P003","K024"),
("P011","K024"),
("P012","K024"),
("P013","K024"),
("P008","K025"),
("P004","K026"),
("P008","K027"),
("P006","K028");

