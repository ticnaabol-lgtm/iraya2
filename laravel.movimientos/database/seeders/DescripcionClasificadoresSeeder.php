<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DescripcionClasificadoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clasificador_descripcions')->insert([
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "NO CORRESPONDE",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "APNF",
                "codigo" => "0",
                "denominacion" => "ADMINISTRACIÓN PÚBLICA NO FINANCIERA",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "OEP",
                "codigo" => "0",
                "denominacion" => "ÓRGANOS DEL ESTADO PLURINACIONAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "OL",
                "codigo" => "0",
                "denominacion" => "ÓRGANO LEGISLATIVO",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ALP",
                "codigo" => "650",
                "denominacion" => "ASAMBLEA LEGISLATIVA PLURINACIONAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "OE",
                "codigo" => "0",
                "denominacion" => "ORGANO EJECUTIVO",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "VPEP",
                "codigo" => "6",
                "denominacion" => "VICEPRESIDENCIA DEL ESTADO PLURINACIONAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MIN-RREE",
                "codigo" => "10",
                "denominacion" => "MINISTERIO DE RELACIONES EXTERIORES",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MIN-GOB",
                "codigo" => "15",
                "denominacion" => "MINISTERIO DE GOBIERNO",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MIN-EDU",
                "codigo" => "16",
                "denominacion" => "MINISTERIO DE EDUCACION",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MIN-DEF",
                "codigo" => "20",
                "denominacion" => "MINISTERIO DE DEFENSA",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MIN-PRES",
                "codigo" => "25",
                "denominacion" => "MINISTERIO DE LA PRESIDENCIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MIN-JTI",
                "codigo" => "30",
                "denominacion" => "MINISTERIO DE JUSTICIA Y TRANSPARENCIA INSTITUCIONAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MIN-EFP",
                "codigo" => "35",
                "denominacion" => "Ministerio de Economía y Finanzas Públicas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MIN-DPEP",
                "codigo" => "41",
                "denominacion" => "Ministerio de Desarrollo Productivo y Economía Plural",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MIN-SAL",
                "codigo" => "46",
                "denominacion" => "Ministerio de Salud",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MIN-DRT",
                "codigo" => "47",
                "denominacion" => "Ministerio de Desarrollo Rural y Tierras",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MIN-DEP",
                "codigo" => "48",
                "denominacion" => "Ministerio de Deportes",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MIN-CULT",
                "codigo" => "52",
                "denominacion" => "Ministerio de Culturas y Turismo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MIN-PD",
                "codigo" => "66",
                "denominacion" => "Ministerio de Planificación del Desarrollo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MIN-TEPS",
                "codigo" => "70",
                "denominacion" => "Ministerio de Trabajo, Empleo y Previsión Social",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MIN-MM",
                "codigo" => "76",
                "denominacion" => "Ministerio de Minería y Metalurgia",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MIN-H",
                "codigo" => "78",
                "denominacion" => "Ministerio de Hidrocarburos",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MIN-OPSV",
                "codigo" => "81",
                "denominacion" => "Ministerio de Obras Públicas, Servicios y Vivienda",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MIN-ENER",
                "codigo" => "85",
                "denominacion" => "Ministerio de Energías",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MIN-MAA",
                "codigo" => "86",
                "denominacion" => "Ministerio de Medio Ambiente y Agua",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MIN-COM",
                "codigo" => "87",
                "denominacion" => "Ministerio de Comunicación",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TGN",
                "codigo" => "99",
                "denominacion" => "Tesoro General de la Nación ENTIDADES DESCONCENTRADAS DEL ORGANO EJECUTIVO Dependencia: Ministerio de Defensa",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "RIBB",
                "codigo" => "0",
                "denominacion" => "Registro Internacional Boliviano de Buques",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Dependencia: Ministerio de la Presidencia",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "GACETA",
                "codigo" => "0",
                "denominacion" => "Gaceta Oficial de Bolivia",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "UPRE",
                "codigo" => "0",
                "denominacion" => "Unidad de Proyectos Especiales",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "UE-FNSE",
                "codigo" => "0",
                "denominacion" => "Unidad Ejecutora del Fondo Nacional de Solidaridad y Equidad",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Dependencia: Ministerio de Economía y Finanzas Públicas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SENAPE",
                "codigo" => "0",
                "denominacion" => "Servicio Nacional de Patrimonio del Estado",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SENASIR",
                "codigo" => "0",
                "denominacion" => "Servicio Nacional del Sistema de Reparto",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "UCPP",
                "codigo" => "0",
                "denominacion" => "Unidad de Coordinación de Programas y Proyectos",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Dependencia: Ministerio de Desarrollo Productivo y Economía Plural",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SENAPI",
                "codigo" => "0",
                "denominacion" => "Servicio Nacional de Propiedad Intelectual",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "IBMETRO",
                "codigo" => "0",
                "denominacion" => "Instituto Boliviano de Metrología",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SENAVEX",
                "codigo" => "0",
                "denominacion" => "Servicio Nacional de Verificación de Exportaciones",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PRO-BOL",
                "codigo" => "0",
                "denominacion" => "Pro - Bolivia",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Dependencia: Ministerio de Salud",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CENETROP",
                "codigo" => "0",
                "denominacion" => "Centro Nacional de Enfermedades Tropicales",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "INLASA",
                "codigo" => "0",
                "denominacion" => "Instituto Nacional de Laboratorios de Salud",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ESLP",
                "codigo" => "0",
                "denominacion" => "Escuela de Salud La Paz",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ESCBBA",
                "codigo" => "0",
                "denominacion" => "Escuela de Salud Cochabamba",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "AGEMED",
                "codigo" => "0",
                "denominacion" => "Agencia Estatal de Medicamentos y Tecnologías en Salud",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Dependencia: Ministerio de Medio Ambiente y Agua",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SERNAP",
                "codigo" => "0",
                "denominacion" => "Servicio Nacional de Áreas Protegidas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "UOB",
                "codigo" => "0",
                "denominacion" => "Unidad Operativa Boliviana",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Dependencia: Ministerio de Desarrollo Rural y Tierras",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SENASAG",
                "codigo" => "0",
                "denominacion" => "Servicio Nacional de Sanidad Agropecuaria e Inocuidad Alimentaria",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "FONADIN",
                "codigo" => "0",
                "denominacion" => "Fondo Nacional de Desarrollo Integral",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SOBAL",
                "codigo" => "0",
                "denominacion" => "Institución Pública Desconcentrada Soberanía Alimentaria",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PACU",
                "codigo" => "0",
                "denominacion" => "Institución Pública Desconcentrada de Pesca y Acuicultura \"PACU\"",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "UE-Pozos",
                "codigo" => "0",
                "denominacion" => "Entidad Pública Desconcentrada Unidad Ejecutora de Pozos",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Dependencia: Ministerio de Culturas y Turismo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CO-BOL",
                "codigo" => "0",
                "denominacion" => "Conoce- Bolivia",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Dependencia: Ministerio de Obras Públicas, Servicios y Vivienda",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CCLP",
                "codigo" => "0",
                "denominacion" => "Centro de Comunicaciones La Paz",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ATTSC",
                "codigo" => "0",
                "denominacion" => "Administradora de Terminal Terrestre Santa Cruz",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Dependencia: Ministerio de Hidrocarburos",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EEC-GNV",
                "codigo" => "0",
                "denominacion" => "Entidad Ejecutora de Conversión a Gas Natural Vehicular",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "OJ-TC",
                "codigo" => "0",
                "denominacion" => "ÓRGANO JUDICIAL Y TRIBUNAL CONSTITUCIONAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "OJ",
                "codigo" => "660",
                "denominacion" => "Órgano Judicial",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TCP",
                "codigo" => "661",
                "denominacion" => "Tribunal Constitucional Plurinacional",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "OEL",
                "codigo" => "0",
                "denominacion" => "ÓRGANO ELECTORAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "OEP",
                "codigo" => "670",
                "denominacion" => "Órgano Electoral Plurinacional",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ICDE",
                "codigo" => "0",
                "denominacion" => "INSTITUCIONES DE CONTROL Y DEFENSA DEL ESTADO",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CGE",
                "codigo" => "680",
                "denominacion" => "Contraloría General del Estado",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MINPUB",
                "codigo" => "681",
                "denominacion" => "Ministerio Público",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "DP",
                "codigo" => "682",
                "denominacion" => "Defensoría del Pueblo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PROGE",
                "codigo" => "683",
                "denominacion" => "Procuraduría General del Estado",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "INSPUBDES",
                "codigo" => "0",
                "denominacion" => "INSTITUCIONES PÚBLICAS DESCENTRALIZADAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Vicepresidencia del Estado Plurinacional",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ADSIB",
                "codigo" => "119",
                "denominacion" => "Agencia para el Desarrollo de la Sociedad de la Información en Bolivia",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Relaciones Exteriores",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "DIREMAR",
                "codigo" => "197",
                "denominacion" => "Dirección Estratégica de Reivindicación Marítima, Silala y Recursos Hídricos",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Internacionales",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Gobierno",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SEGIP",
                "codigo" => "340",
                "denominacion" => "Servicio General de Identificación Personal",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MUSERPOL",
                "codigo" => "345",
                "denominacion" => "Mutual de Servicios al Policía",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SEGELIC",
                "codigo" => "341",
                "denominacion" => "Servicio General de Licencias de Conducir",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Educación",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "COPLUMU",
                "codigo" => "109",
                "denominacion" => "Conservatorio Plurinacional de Música",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ANC",
                "codigo" => "124",
                "denominacion" => "Academia Nacional de Ciencias",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EGPP",
                "codigo" => "129",
                "denominacion" => "Escuela de Gestión Pública Plurinacional",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PSCU",
                "codigo" => "150",
                "denominacion" => "Proyecto Sucre Ciudad Universitaria",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "OPCE",
                "codigo" => "153",
                "denominacion" => "Observatorio Plurinacional de la Calidad Educativa",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "DDE -CHU",
                "codigo" => "265",
                "denominacion" => "Dirección Departamental de Educación Chuquisaca",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "DDE - LPZ",
                "codigo" => "266",
                "denominacion" => "Dirección Departamental de Educación La Paz",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "DDE -CBB",
                "codigo" => "267",
                "denominacion" => "Dirección Departamental de Educación Cochabamba",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "DDE - ORU",
                "codigo" => "268",
                "denominacion" => "Dirección Departamental de Educación Oruro",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "DDE - PTS",
                "codigo" => "269",
                "denominacion" => "Dirección Departamental de Educación Potosí",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "DDE -TAR",
                "codigo" => "270",
                "denominacion" => "Dirección Departamental de Educación Tarija",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "DDE -SCZ",
                "codigo" => "271",
                "denominacion" => "Dirección Departamental de Educación Santa Cruz",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "DDE - BEN",
                "codigo" => "272",
                "denominacion" => "Dirección Departamental de Educación Beni",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "DDE - PAN",
                "codigo" => "273",
                "denominacion" => "Dirección Departamental de Educación Pando",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EBIM",
                "codigo" => "324",
                "denominacion" => "Escuela Boliviana Intercultural de Música",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "IPELC",
                "codigo" => "344",
                "denominacion" => "Instituto Plurinacional de Estudio de Lenguas y Culturas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EBID",
                "codigo" => "379",
                "denominacion" => "Escuela Boliviana Intercultural de Danza",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Defensa",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EMI",
                "codigo" => "170",
                "denominacion" => "Escuela Militar de Ingeniería",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SNHN",
                "codigo" => "243",
                "denominacion" => "Servicio Nacional de Hidrografía Naval",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SNAF",
                "codigo" => "244",
                "denominacion" => "Servicio Nacional de Aerofotogrametría",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SE-GEOMAP",
                "codigo" => "245",
                "denominacion" => "Servicio Geodésico de Mapas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de la Presidencia",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "OFEP",
                "codigo" => "159",
                "denominacion" => "Oficina Técnica para el Fortalecimiento de la Empresa Pública",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "AGETIC",
                "codigo" => "374",
                "denominacion" => "Agencia de Gobierno Electrónico y Tecnologías de Información y Comunicación",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SEA",
                "codigo" => "226",
                "denominacion" => "Servicio Estatal de Autonomías",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Justicia y Transparencia Institucional",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CONALPEDIS",
                "codigo" => "112",
                "denominacion" => "Comité Nacional de la Persona con Discapacidad",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SEPDEP",
                "codigo" => "152",
                "denominacion" => "Servicio Plurinacional de Defensa Pública",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "DIRNOPLU",
                "codigo" => "155",
                "denominacion" => "Dirección del Notariado Plurinacional",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SEPDAVI",
                "codigo" => "156",
                "denominacion" => "Servicio Plurinacional de Asistencia a la Víctima",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SEPRET",
                "codigo" => "157",
                "denominacion" => "Servicio para la Prevención de la Tortura",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CV",
                "codigo" => "384",
                "denominacion" => "Comisión de la Verdad",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SEPMUD",
                "codigo" => "386",
                "denominacion" => "Servicio Plurinacional de la Mujer y de la Despatriarcalización Ana María Romero",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Economía y Finanzas Públicas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "AGIT",
                "codigo" => "169",
                "denominacion" => "Autoridad General de Impugnación Tributaria",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "RUAT",
                "codigo" => "200",
                "denominacion" => "Registro Único para la Administración Tributaria Municipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ASFI",
                "codigo" => "203",
                "denominacion" => "Autoridad de Supervisión del Sistema Financiero",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "AN",
                "codigo" => "283",
                "denominacion" => "Aduana Nacional (*)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SIN",
                "codigo" => "290",
                "denominacion" => "Servicio de Impuestos Nacionales (*)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "AJ",
                "codigo" => "309",
                "denominacion" => "Autoridad de Fiscalización del Juego",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "APS",
                "codigo" => "313",
                "denominacion" => "Autoridad de Fiscalización y Control de Pensiones y Seguros",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "UIF",
                "codigo" => "346",
                "denominacion" => "Unidad de Investigaciones Financieras",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Desarrollo Productivo y Economía Plural",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SEDEM",
                "codigo" => "132",
                "denominacion" => "Servicio de Desarrollo de las Empresas Públicas Productivas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "IN - BOL",
                "codigo" => "224",
                "denominacion" => "Insumos Bolivia",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ZOFRACOBIJA",
                "codigo" => "227",
                "denominacion" => "Zona Franca Comercial e Industrial de Cobija",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "AEMP",
                "codigo" => "315",
                "denominacion" => "Autoridad de Fiscalización de Empresas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SENATEX",
                "codigo" => "378",
                "denominacion" => "Servicio Nacional Textil",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Salud",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "IBC",
                "codigo" => "111",
                "denominacion" => "Instituto Boliviano de la Ceguera",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "LONABOL",
                "codigo" => "133",
                "denominacion" => "Lotería Nacional de Beneficencia y Salubridad",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CEASS",
                "codigo" => "249",
                "denominacion" => "Central de Abastecimiento y Suministros de Salud",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "INSO",
                "codigo" => "251",
                "denominacion" => "Instituto Nacional de Salud Ocupacional",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "AISEM",
                "codigo" => "382",
                "denominacion" => "Agencia de Infraestructura en Salud y Equipamiento Médico",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ASUSS",
                "codigo" => "385",
                "denominacion" => "Autoridad de Supervisión de la Seguridad Social de Corto Plazo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Desarrollo Rural y Tierras",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "INRA",
                "codigo" => "212",
                "denominacion" => "Instituto Nacional de Reforma Agraria",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "INIAF",
                "codigo" => "222",
                "denominacion" => "Instituto Nacional de Innovación Agropecuaria y Forestal",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "INSA",
                "codigo" => "254",
                "denominacion" => "Instituto del Seguro Agrario(*)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CIQ",
                "codigo" => "371",
                "denominacion" => "Centro Internacional de la Quinua",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "FDI",
                "codigo" => "373",
                "denominacion" => "Fondo de Desarrollo Indígena",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Culturas y Turismo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "OSN",
                "codigo" => "108",
                "denominacion" => "Orquesta Sinfónica Nacional",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CIAAAT",
                "codigo" => "349",
                "denominacion" => "Centro de Investigaciones Arqueológicas, Antropológicas y Adm. de Tiwanaku",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ADECINE",
                "codigo" => "387",
                "denominacion" => "Agencia del Desarrollo del Cine y Audiovisual Bolivianos",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Planificación del Desarrollo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ADEMAF",
                "codigo" => "201",
                "denominacion" => "Agencia para el Desarrollo de las Macroregiones y Zonas Fronterizas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "INE",
                "codigo" => "206",
                "denominacion" => "Instituto Nacional de Estadística",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "UDAPE",
                "codigo" => "210",
                "denominacion" => "Unidad de Análisis de Políticas Sociales y Económicas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "FPS",
                "codigo" => "287",
                "denominacion" => "Fondo Nacional de Inversión Productiva y Social",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Minería y Metalurgia",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "AJAM",
                "codigo" => "190",
                "denominacion" => "Autoridad Jurisdiccional Administrativa Minera",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SENARECOM",
                "codigo" => "221",
                "denominacion" => "Servicio Nacional de Registro y Control de la Comercialización de Minerales y Metales",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SERGEOMIN",
                "codigo" => "234",
                "denominacion" => "Servicio Geológico Minero",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "FAREMIN",
                "codigo" => "381",
                "denominacion" => "Fondo de Apoyo a la Reactivación de la Minería Chica",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Hidrocarburos",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ANH",
                "codigo" => "163",
                "denominacion" => "Agencia Nacional de Hidrocarburos",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Obras Públicas, Servicios y Vivienda",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "DGAC",
                "codigo" => "117",
                "denominacion" => "Dirección General de Aeronáutica Civil (*)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "COVIPOL",
                "codigo" => "134",
                "denominacion" => "Consejo Nacional de Vivienda Policial",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SEMENA",
                "codigo" => "192",
                "denominacion" => "Servicio al Mejoramiento de la Navegación Amazónica",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ABC",
                "codigo" => "291",
                "denominacion" => "Administradora Boliviana de Carreteras (*)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "V°B°",
                "codigo" => "292",
                "denominacion" => "Vías Bolivia",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ATT",
                "codigo" => "310",
                "denominacion" => "Autoridad de Regulación y Fiscalización de Telecomunicaciones y Transportes",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "AEVIVIENDA",
                "codigo" => "342",
                "denominacion" => "Agencia Estatal de Vivienda",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "AASANA",
                "codigo" => "512",
                "denominacion" => "Administración de Aeropuertos y Servicios Auxiliares a la Navegación Aérea",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "COBOL",
                "codigo" => "383",
                "denominacion" => "Agencia Boliviana de Correos \"Correos de Bolivia\"",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Energías",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "AETN",
                "codigo" => "314",
                "denominacion" => "Autoridad de Fiscalización de Electricidad y Tecnología Nuclear",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ABEN",
                "codigo" => "376",
                "denominacion" => "Agencia Boliviana de Energía Nuclear",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Medio Ambiente y Agua",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MNHN",
                "codigo" => "154",
                "denominacion" => "Museo Nacional de Historia Natural",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SENAMHI",
                "codigo" => "213",
                "denominacion" => "Servicio Nacional de Meteorología e Hidrología",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "FONABOSQUE",
                "codigo" => "223",
                "denominacion" => "Fondo Nacional de Desarrollo Forestal",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SENASBA",
                "codigo" => "225",
                "denominacion" => "Servicio Nacional para la Sostenibilidad en Saneamiento Básico",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EMAGUA",
                "codigo" => "253",
                "denominacion" => "Entidad Ejecutora de Medio Ambiente y Agua",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "OTNR-PB",
                "codigo" => "281",
                "denominacion" => "Oficina Técnica Nacional de los Ríos Pilcomayo y Bermejo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SENARI",
                "codigo" => "288",
                "denominacion" => "Servicio Nacional de Riego (*)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SEDERI-CHU",
                "codigo" => "298",
                "denominacion" => "Servicio Departamental de Riego - Chuquisaca",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SEDERI-LPZ",
                "codigo" => "299",
                "denominacion" => "Servicio Departamental de Riego - La Paz",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SEDERI-CBB",
                "codigo" => "300",
                "denominacion" => "Servicio Departamental de Riego - Cochabamba",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SEDERI-ORU",
                "codigo" => "301",
                "denominacion" => "Servicio Departamental de Riego - Oruro",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SEDERI-PTS",
                "codigo" => "302",
                "denominacion" => "Servicio Departamental de Riego - Potosí",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SEDERI-TAR",
                "codigo" => "303",
                "denominacion" => "Servicio Departamental de Riego - Tarija",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SEDERI-SCZ",
                "codigo" => "304",
                "denominacion" => "Servicio Departamental de Riego - Santa Cruz",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SEDERI-BEN",
                "codigo" => "305",
                "denominacion" => "Servicio Departamental de Riego - Beni",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SEDERI-PAN",
                "codigo" => "306",
                "denominacion" => "Servicio Departamental de Riego - Pando",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "AAPS",
                "codigo" => "311",
                "denominacion" => "Autoridad de Fiscalización y Control Social de Agua Potable y Saneamiento Básico",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ABT",
                "codigo" => "312",
                "denominacion" => "Autoridad de Fiscalización y Control Social de Bosques y Tierras",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "APMT",
                "codigo" => "348",
                "denominacion" => "Autoridad Plurinacional de la Madre Tierra (*)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Trabajo, Empleo y Previsión Social",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "AFCOOP",
                "codigo" => "347",
                "denominacion" => "Autoridad de Fiscalización y Control de Cooperativas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Órgano Judicial",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EJE",
                "codigo" => "343",
                "denominacion" => "Escuela de Jueces del Estado",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Banco Central de Bolivia",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "FC - BCB",
                "codigo" => "293",
                "denominacion" => "Fundación Cultural del Banco Central de Bolivia",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "UNIV-PUB",
                "codigo" => "0",
                "denominacion" => "UNIVERSIDADES PÚBLICAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CEUB",
                "codigo" => "137",
                "denominacion" => "Comité Ejecutivo de la Universidad Boliviana",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "UMSFX",
                "codigo" => "138",
                "denominacion" => "Universidad Mayor Real y Pontificia de San Francisco Xavier",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "UMSA",
                "codigo" => "139",
                "denominacion" => "Universidad Mayor de San Andrés",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "UPEA",
                "codigo" => "140",
                "denominacion" => "Universidad Pública de El Alto",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "UMSS",
                "codigo" => "141",
                "denominacion" => "Universidad Mayor de San Simón",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "UTO",
                "codigo" => "142",
                "denominacion" => "Universidad Técnica de Oruro",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "UATF",
                "codigo" => "143",
                "denominacion" => "Universidad Autónoma Tomás Frías",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "UNSXX",
                "codigo" => "144",
                "denominacion" => "Universidad Nacional Siglo XX",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "UAJMS",
                "codigo" => "145",
                "denominacion" => "Universidad Autónoma Juan Misael Saracho",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "UAGRM",
                "codigo" => "146",
                "denominacion" => "Universidad Autónoma Gabriel René Moreno",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "UAB",
                "codigo" => "147",
                "denominacion" => "Universidad Autónoma del Beni José Ballivián",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "UAP",
                "codigo" => "148",
                "denominacion" => "Universidad Amazónica de Pando",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Educación",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "UNIBOL-TK",
                "codigo" => "294",
                "denominacion" => "Universidad Indígena Boliviana Comunitaria Intercultural Productiva Tupak Katari",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "UNIBOL-CH",
                "codigo" => "295",
                "denominacion" => "Universidad Indígena Boliviana Comunitaria Intercultural Productiva Casimiro Huanca",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "UNIBOL-AT",
                "codigo" => "296",
                "denominacion" => "Universidad Indígena Boliviana Comunitaria Intercultural Productiva Apiaguaiki Tupa",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ISS",
                "codigo" => "0",
                "denominacion" => "INSTITUCIONES DE SEGURIDAD SOCIAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Defensa",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "COSSMIL",
                "codigo" => "411",
                "denominacion" => "Corporación del Seguro Social Militar",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Salud",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CNS",
                "codigo" => "417",
                "denominacion" => "Caja Nacional de Salud",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CPS",
                "codigo" => "418",
                "denominacion" => "Caja Petrolera de Salud",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CBES",
                "codigo" => "422",
                "denominacion" => "Caja Bancaria Estatal de Salud",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CSSNCRA",
                "codigo" => "423",
                "denominacion" => "Caja de Salud del Servicio Nacional de Caminos y Ramas Anexas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CORDES",
                "codigo" => "424",
                "denominacion" => "Caja de Salud CORDES",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SSUCBBA",
                "codigo" => "425",
                "denominacion" => "Seguro Social Universitario de Cochabamba",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SSUORU",
                "codigo" => "426",
                "denominacion" => "Seguro Social Universitario de Oruro",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SSUSTCRUZ",
                "codigo" => "427",
                "denominacion" => "Seguro Social Universitario de Santa Cruz",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SSUSUC",
                "codigo" => "428",
                "denominacion" => "Seguro Social Universitario de Sucre",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SSULPZ",
                "codigo" => "429",
                "denominacion" => "Seguro Social Universitario de La Paz",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SSUTAR",
                "codigo" => "432",
                "denominacion" => "Seguro Social Universitario de Tarija",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SSUPTS",
                "codigo" => "433",
                "denominacion" => "Seguro Social Universitario de Potosí",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SSUBENI",
                "codigo" => "434",
                "denominacion" => "Seguro Social Universitario de Beni",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SINEC",
                "codigo" => "435",
                "denominacion" => "Seguro Integral de Salud",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EMP-PUB",
                "codigo" => "0",
                "denominacion" => "EMPRESAS PÚBLICAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "E M P-NAL",
                "codigo" => "0",
                "denominacion" => "EMPRESAS NACIONALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Defensa",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TAB",
                "codigo" => "525",
                "denominacion" => "Transportes Aéreos Bolivianos",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "COFADENA",
                "codigo" => "548",
                "denominacion" => "Corporación de las Fuerzas Armadas para el Desarrollo Nacional",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ENABOL",
                "codigo" => "551",
                "denominacion" => "Empresa Naviera Boliviana",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TAM",
                "codigo" => "596",
                "denominacion" => "Empresa Pública Transporte Aéreo Militar",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CABV",
                "codigo" => "718",
                "denominacion" => "Complejo Agroindustrial Buena Vista",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ESABOL",
                "codigo" => "600",
                "denominacion" => "Empresa Servicios Aéreos Bolivianos",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Economía y Finanzas Públicas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "DAB",
                "codigo" => "580",
                "denominacion" => "Depósitos Aduaneros Bolivianos",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ASP-B",
                "codigo" => "594",
                "denominacion" => "Administración de Servicios Portuarios - Bolivia",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "GESTORA",
                "codigo" => "595",
                "denominacion" => "Gestora Pública de la Seguridad Social de Largo Plazo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Desarrollo Productivo y Economía Plural",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EMAPA",
                "codigo" => "572",
                "denominacion" => "Empresa de Apoyo a la Producción de Alimentos",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PAPELBOL",
                "codigo" => "575",
                "denominacion" => "Empresa Pública Nacional Estratégica Papeles de Bolivia",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CARTONBOL",
                "codigo" => "576",
                "denominacion" => "Empresa Pública Nacional Estratégica Cartones de Bolivia",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ECEBOL",
                "codigo" => "579",
                "denominacion" => "Empresa Pública Nacional Estratégica Cementos de Bolivia",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EASBA",
                "codigo" => "586",
                "denominacion" => "Empresa Azucarera San Buenaventura",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "QUIPUS",
                "codigo" => "590",
                "denominacion" => "Empresa Pública QUIPUS",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "YACANA",
                "codigo" => "593",
                "denominacion" => "Empresa Pública YACANA",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EBA",
                "codigo" => "599",
                "denominacion" => "Empresa Boliviana de Alimentos y Derivados",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Minería y Metalurgia",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "COMIBOL",
                "codigo" => "517",
                "denominacion" => "Corporación Minera de Bolivia",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "VINTO - NAL",
                "codigo" => "520",
                "denominacion" => "Empresa Metalúrgica VINTO -Nacionalizada",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ES - MUTUN",
                "codigo" => "573",
                "denominacion" => "Empresa Siderúrgica del Mutún",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Hidrocarburos",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "YPFB",
                "codigo" => "513",
                "denominacion" => "Yacimientos Petrolíferos Fiscales Bolivianos",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EBIH",
                "codigo" => "584",
                "denominacion" => "Empresa Boliviana de Industrialización de Hidrocarburos",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Obras Públicas, Servicios y Vivienda",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ENFE",
                "codigo" => "522",
                "denominacion" => "Empresa Nacional de Ferrocarriles - Residual",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "BoA",
                "codigo" => "578",
                "denominacion" => "Boliviana de Aviación",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ABE",
                "codigo" => "585",
                "denominacion" => "Agencia Boliviana Espacial",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EBC",
                "codigo" => "587",
                "denominacion" => "Empresa Estratégica Boliviana de Construcción y Conservación de Infraestructura Civil",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MI TELEFERICO",
                "codigo" => "591",
                "denominacion" => "Empresa Estatal de Transporte por Cable \"Mi Teleférico\"",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Energías",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ENDE",
                "codigo" => "514",
                "denominacion" => "Empresa Nacional de Electricidad",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "YLB",
                "codigo" => "597",
                "denominacion" => "Empresa Pública Nacional Estratégica de Yacimientos de Litio Bolivianos",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Comunicación",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "BTV",
                "codigo" => "526",
                "denominacion" => "Empresa Estatal de Televisión \"BOLIVIA TV\"",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EDITORIAL",
                "codigo" => "598",
                "denominacion" => "Empresa Pública \"Editorial del Estado Plurinacional de Bolivia\"",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Culturas y Turismo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "BOLTUR",
                "codigo" => "592",
                "denominacion" => "Empresa Estatal \"Boliviana de Turismo\"",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Medio Ambiente y Aguas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MISICUNI",
                "codigo" => "633",
                "denominacion" => "Empresa Misicuni",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "GAD",
                "codigo" => "0",
                "denominacion" => "GOBIERNOS AUTÓNOMOS DEPARTAMENTALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "GAD-CHU",
                "codigo" => "901",
                "denominacion" => "Gobierno Autónomo Departamental de Chuquisaca",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "GAD-LPZ",
                "codigo" => "902",
                "denominacion" => "Gobierno Autónomo Departamental de La Paz",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "GAD-CBB",
                "codigo" => "903",
                "denominacion" => "Gobierno Autónomo Departamental de Cochabamba",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "GAD-ORU",
                "codigo" => "904",
                "denominacion" => "Gobierno Autónomo Departamental de Oruro",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "GAD-PTS",
                "codigo" => "905",
                "denominacion" => "Gobierno Autónomo Departamental de Potosí",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "GAD-TAR",
                "codigo" => "906",
                "denominacion" => "Gobierno Autónomo Departamental de Tarija",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "GAD-SCZ",
                "codigo" => "907",
                "denominacion" => "Gobierno Autónomo Departamental de Santa Cruz",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "GAD-BEN",
                "codigo" => "908",
                "denominacion" => "Gobierno Autónomo Departamental del Beni",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "GAD-PAN",
                "codigo" => "909",
                "denominacion" => "Gobierno Autónomo Departamental de Pando",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "GAR",
                "codigo" => "0",
                "denominacion" => "GOBIERNOS AUTÓNOMOS REGIONALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Departamento de Tarija",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "GAR-GCH",
                "codigo" => "4601",
                "denominacion" => "Gobierno Autónomo Regional del Gran Chaco",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "GAM",
                "codigo" => "0",
                "denominacion" => "GOBIERNOS AUTÓNOMOS MUNICIPALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Gobiernos Autónomos Municipales del Departamento de Chuquisaca",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SUC",
                "codigo" => "1101",
                "denominacion" => "Gobierno Autónomo Municipal de Sucre",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "YOT",
                "codigo" => "1102",
                "denominacion" => "Gobierno Autónomo Municipal de Yotala",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "POR",
                "codigo" => "1103",
                "denominacion" => "Gobierno Autónomo Municipal de Poroma",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "AZU",
                "codigo" => "1104",
                "denominacion" => "Gobierno Autónomo Municipal de Villa Azurduy",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TAR",
                "codigo" => "1105",
                "denominacion" => "Gobierno Autónomo Municipal de Tarvita (Villa Orías)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ZUD",
                "codigo" => "1106",
                "denominacion" => "Gobierno Autónomo Municipal de Villa Zudañez (Tacopaya)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PRE",
                "codigo" => "1107",
                "denominacion" => "Gobierno Autónomo Municipal de Presto",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "VMO",
                "codigo" => "1108",
                "denominacion" => "Gobierno Autónomo Municipal de Villa Mojocoya",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MUJ",
                "codigo" => "1109",
                "denominacion" => "Gobierno Autónomo Municipal de Icla",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PAD",
                "codigo" => "1110",
                "denominacion" => "Gobierno Autónomo Municipal de Padilla",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "VTM",
                "codigo" => "1111",
                "denominacion" => "Gobierno Autónomo Municipal de Tomina",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SOP",
                "codigo" => "1112",
                "denominacion" => "Gobierno Autónomo Municipal de Sopachuy",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ALC",
                "codigo" => "1113",
                "denominacion" => "Gobierno Autónomo Municipal de Villa Alcalá",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "VIL",
                "codigo" => "1114",
                "denominacion" => "Gobierno Autónomo Municipal de El Villar",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "VMT",
                "codigo" => "1115",
                "denominacion" => "Gobierno Autónomo Municipal de Monteagudo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PDM",
                "codigo" => "1116",
                "denominacion" => "Gobierno Autónomo Municipal de San Pablo de Huacareta",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TARB",
                "codigo" => "1117",
                "denominacion" => "Gobierno Autónomo Municipal de Tarabuco",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "YAM",
                "codigo" => "1118",
                "denominacion" => "Gobierno Autónomo Municipal de Yamparáez",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CAM",
                "codigo" => "1119",
                "denominacion" => "Gobierno Autónomo Municipal de Camargo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "LUC",
                "codigo" => "1120",
                "denominacion" => "Gobierno Autónomo Municipal de San Lucas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "INCA",
                "codigo" => "1121",
                "denominacion" => "Gobierno Autónomo Municipal de Incahuasi",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SER",
                "codigo" => "1122",
                "denominacion" => "Gobierno Autónomo Municipal de Villa Serrano",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ABE",
                "codigo" => "1123",
                "denominacion" => "Gobierno Autónomo Municipal de Camataqui (Villa Abecia)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CUL",
                "codigo" => "1124",
                "denominacion" => "Gobierno Autónomo Municipal de Culpina",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CRR",
                "codigo" => "1125",
                "denominacion" => "Gobierno Autónomo Municipal de Las Carreras",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MUY",
                "codigo" => "1126",
                "denominacion" => "Gobierno Autónomo Municipal de Villa Vaca Guzmán",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "VHY",
                "codigo" => "1127",
                "denominacion" => "Gobierno Autónomo Municipal de Villa de Huacaya",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MAC",
                "codigo" => "1128",
                "denominacion" => "Gobierno Autónomo Municipal de Machareti",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "VCH",
                "codigo" => "1129",
                "denominacion" => "Gobierno Autónomo Municipal de Villa Charcas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Gobiernos Autónomos Municipales del Departamento de La Paz",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "LPZ",
                "codigo" => "1201",
                "denominacion" => "Gobierno Autónomo Municipal de La Paz",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PLC",
                "codigo" => "1202",
                "denominacion" => "Gobierno Autónomo Municipal de Palca",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MEC",
                "codigo" => "1203",
                "denominacion" => "Gobierno Autónomo Municipal de Mecapaca",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ACH",
                "codigo" => "1204",
                "denominacion" => "Gobierno Autónomo Municipal de Achocalla",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ELLA",
                "codigo" => "1205",
                "denominacion" => "Gobierno Autónomo Municipal de El Alto de La Paz",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "VIA",
                "codigo" => "1206",
                "denominacion" => "Gobierno Autónomo Municipal de Viacha",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "GUA",
                "codigo" => "1207",
                "denominacion" => "Gobierno Autónomo Municipal de Guaqui",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TIA",
                "codigo" => "1208",
                "denominacion" => "Gobierno Autónomo Municipal de Tiahuanacu",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "DES",
                "codigo" => "1209",
                "denominacion" => "Gobierno Autónomo Municipal de Desaguadero",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CRV",
                "codigo" => "1210",
                "denominacion" => "Gobierno Autónomo Municipal de Caranavi",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SIC",
                "codigo" => "1211",
                "denominacion" => "Gobierno Autónomo Municipal de Sica Sica (Villa Aroma)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "UMA",
                "codigo" => "1212",
                "denominacion" => "Gobierno Autónomo Municipal de Umala",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "AYO",
                "codigo" => "1213",
                "denominacion" => "Gobierno Autónomo Municipal de Ayo Ayo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CAL",
                "codigo" => "1214",
                "denominacion" => "Gobierno Autónomo Municipal de Calamarca",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PAT",
                "codigo" => "1215",
                "denominacion" => "Gobierno Autónomo Municipal de Patacamaya",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "COL",
                "codigo" => "1216",
                "denominacion" => "Gobierno Autónomo Municipal de Colquencha",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "COA",
                "codigo" => "1217",
                "denominacion" => "Gobierno Autónomo Municipal de Collana",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "INQ",
                "codigo" => "1218",
                "denominacion" => "Gobierno Autónomo Municipal de Inquisivi",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "QUI",
                "codigo" => "1219",
                "denominacion" => "Gobierno Autónomo Municipal de Quime",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CAJ",
                "codigo" => "1220",
                "denominacion" => "Gobierno Autónomo Municipal de Cajuata",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "COQ",
                "codigo" => "1221",
                "denominacion" => "Gobierno Autónomo Municipal de Colquiri",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ICH",
                "codigo" => "1222",
                "denominacion" => "Gobierno Autónomo Municipal de Ichoca",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "LIC",
                "codigo" => "1223",
                "denominacion" => "Gobierno Autónomo Municipal de Villa Libertad Licoma",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "AHÍ",
                "codigo" => "1224",
                "denominacion" => "Gobierno Autónomo Municipal de Achacachi",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ANCO",
                "codigo" => "1225",
                "denominacion" => "Gobierno Autónomo Municipal de Ancoraimes",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SOR",
                "codigo" => "1226",
                "denominacion" => "Gobierno Autónomo Municipal de Sorata",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "GNY",
                "codigo" => "1227",
                "denominacion" => "Gobierno Autónomo Municipal de Guanay",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TAT",
                "codigo" => "1228",
                "denominacion" => "Gobierno Autónomo Municipal de Tacacoma",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TIP",
                "codigo" => "1229",
                "denominacion" => "Gobierno Autónomo Municipal de Tipuani",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "QBY",
                "codigo" => "1230",
                "denominacion" => "Gobierno Autónomo Municipal de Quiabaya",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "COM",
                "codigo" => "1231",
                "denominacion" => "Gobierno Autónomo Municipal de Combaya",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "COP",
                "codigo" => "1232",
                "denominacion" => "Gobierno Autónomo Municipal de Copacabana",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SPT",
                "codigo" => "1233",
                "denominacion" => "Gobierno Autónomo Municipal de San Pedro de Tiquina",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "YUP",
                "codigo" => "1234",
                "denominacion" => "Gobierno Autónomo Municipal de Tito Yupanqui",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CHU",
                "codigo" => "1235",
                "denominacion" => "Gobierno Autónomo Municipal de Chuma",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "AYA",
                "codigo" => "1236",
                "denominacion" => "Gobierno Autónomo Municipal de Ayata",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "AUC",
                "codigo" => "1237",
                "denominacion" => "Gobierno Autónomo Municipal de Aucapata",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "COR",
                "codigo" => "1238",
                "denominacion" => "Gobierno Autónomo Municipal de Corocoro",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CAQ",
                "codigo" => "1239",
                "denominacion" => "Gobierno Autónomo Municipal de Caquiaviri",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CAC",
                "codigo" => "1240",
                "denominacion" => "Gobierno Autónomo Municipal de Calacoto",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CMC",
                "codigo" => "1241",
                "denominacion" => "Gobierno Autónomo Municipal de Comanche",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CHA",
                "codigo" => "1242",
                "denominacion" => "Gobierno Autónomo Municipal de Charaña",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "BAL",
                "codigo" => "1243",
                "denominacion" => "Gobierno Autónomo Municipal de Waldo Ballivián",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "NAZ",
                "codigo" => "1244",
                "denominacion" => "Gobierno Autónomo Municipal de Nazacara de Pacajes",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SCA",
                "codigo" => "1245",
                "denominacion" => "Gobierno Autónomo Municipal de Santiago de Callapa",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ACO",
                "codigo" => "1246",
                "denominacion" => "Gobierno Autónomo Municipal de Puerto Acosta",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MOC",
                "codigo" => "1247",
                "denominacion" => "Gobierno Autónomo Municipal de Mocomoco",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CCH",
                "codigo" => "1248",
                "denominacion" => "Gobierno Autónomo Municipal de Carabuco",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "APO",
                "codigo" => "1249",
                "denominacion" => "Gobierno Autónomo Municipal de Apolo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PEL",
                "codigo" => "1250",
                "denominacion" => "Gobierno Autónomo Municipal de Pelechuco",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "LUR",
                "codigo" => "1251",
                "denominacion" => "Gobierno Autónomo Municipal de Luribay",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SAPA",
                "codigo" => "1252",
                "denominacion" => "Gobierno Autónomo Municipal de Sapahaqui",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "YAC",
                "codigo" => "1253",
                "denominacion" => "Gobierno Autónomo Municipal de Yaco",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MAL",
                "codigo" => "1254",
                "denominacion" => "Gobierno Autónomo Municipal de Malla",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CAI",
                "codigo" => "1255",
                "denominacion" => "Gobierno Autónomo Municipal de Cairoma",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CHL",
                "codigo" => "1256",
                "denominacion" => "Gobierno Autónomo Municipal de Chulumani (Villa de la Libertad)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "IRU",
                "codigo" => "1257",
                "denominacion" => "Gobierno Autónomo Municipal de Irupana (Villa de Lanza)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "YAN",
                "codigo" => "1258",
                "denominacion" => "Gobierno Autónomo Municipal de Yanacachi",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "BLA",
                "codigo" => "1259",
                "denominacion" => "Gobierno Autónomo Municipal de Palos Blancos",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ASU",
                "codigo" => "1260",
                "denominacion" => "Gobierno Autónomo Municipal de La Asunta",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PUC",
                "codigo" => "1261",
                "denominacion" => "Gobierno Autónomo Municipal de Pucarani",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "LAJ",
                "codigo" => "1262",
                "denominacion" => "Gobierno Autónomo Municipal de Laja",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "BAT",
                "codigo" => "1263",
                "denominacion" => "Gobierno Autónomo Municipal de Batallas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PER",
                "codigo" => "1264",
                "denominacion" => "Gobierno Autónomo Municipal de Puerto Pérez",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "COC",
                "codigo" => "1265",
                "denominacion" => "Gobierno Autónomo Municipal de Coroico",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CRI",
                "codigo" => "1266",
                "denominacion" => "Gobierno Autónomo Municipal de Coripata",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "IXI",
                "codigo" => "1267",
                "denominacion" => "Gobierno Autónomo Municipal de Ixiamas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SBV",
                "codigo" => "1268",
                "denominacion" => "Gobierno Autónomo Municipal de San Buenaventura",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CPE",
                "codigo" => "1269",
                "denominacion" => "Gobierno Autónomo Municipal de General Juan José Pérez (Charazani)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CUR",
                "codigo" => "1270",
                "denominacion" => "Gobierno Autónomo Municipal de Curva",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PEC",
                "codigo" => "1271",
                "denominacion" => "Gobierno Autónomo Municipal de San Pedro de Curahuara",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PAP",
                "codigo" => "1272",
                "denominacion" => "Gobierno Autónomo Municipal de Papel Pampa",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CLL",
                "codigo" => "1273",
                "denominacion" => "Gobierno Autónomo Municipal de Chacarilla",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SMA",
                "codigo" => "1274",
                "denominacion" => "Gobierno Autónomo Municipal de Santiago de Machaca",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CAT",
                "codigo" => "1275",
                "denominacion" => "Gobierno Autónomo Municipal de Catacora",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MAP",
                "codigo" => "1276",
                "denominacion" => "Gobierno Autónomo Municipal de Mapiri",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TEO",
                "codigo" => "1277",
                "denominacion" => "Gobierno Autónomo Municipal de Teoponte",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "AMA",
                "codigo" => "1278",
                "denominacion" => "Gobierno Autónomo Municipal de San Andrés de Machaca",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "JMK",
                "codigo" => "1279",
                "denominacion" => "Gobierno Autónomo Municipal de Jesús de Machaca",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TCO",
                "codigo" => "1280",
                "denominacion" => "Gobierno Autónomo Municipal de Taraco",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "HUAR",
                "codigo" => "1281",
                "denominacion" => "Gobierno Autónomo Municipal de Huarina",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SAH",
                "codigo" => "1282",
                "denominacion" => "Gobierno Autónomo Municipal de Santiago de Huata",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ESC",
                "codigo" => "1283",
                "denominacion" => "Gobierno Autónomo Municipal de Escoma",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "HUMA",
                "codigo" => "1284",
                "denominacion" => "Gobierno Autónomo Municipal de Humanata",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ABN",
                "codigo" => "1285",
                "denominacion" => "Gobierno Autónomo Municipal de Alto Beni",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "HUAT",
                "codigo" => "1286",
                "denominacion" => "Gobierno Autónomo Municipal de Huatajata",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CHCO",
                "codigo" => "1287",
                "denominacion" => "Gobierno Autónomo Municipal de Chua Cocani",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Gobiernos Autónomos Municipales del Departamento de Cochabamba",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CBB",
                "codigo" => "1301",
                "denominacion" => "Gobierno Autónomo Municipal de Cochabamba",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "QLL",
                "codigo" => "1302",
                "denominacion" => "Gobierno Autónomo Municipal de Quillacollo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SIP",
                "codigo" => "1303",
                "denominacion" => "Gobierno Autónomo Municipal de SipeSipe",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TIQ",
                "codigo" => "1304",
                "denominacion" => "Gobierno Autónomo Municipal de Tiquipaya",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "VIN",
                "codigo" => "1305",
                "denominacion" => "Gobierno Autónomo Municipal de Vinto",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CCP",
                "codigo" => "1306",
                "denominacion" => "Gobierno Autónomo Municipal de Colcapirhua",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "AIQ",
                "codigo" => "1307",
                "denominacion" => "Gobierno Autónomo Municipal de Aiquile",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PAS",
                "codigo" => "1308",
                "denominacion" => "Gobierno Autónomo Municipal de Pasorapa",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "OME",
                "codigo" => "1309",
                "denominacion" => "Gobierno Autónomo Municipal de Omereque",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "IND",
                "codigo" => "1310",
                "denominacion" => "Gobierno Autónomo Municipal de Independencia",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MOH",
                "codigo" => "1311",
                "denominacion" => "Gobi erno Autónomo Municipal de Morochata",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SCB",
                "codigo" => "1312",
                "denominacion" => "Gobi erno Autónomo Municipal de Sacaba",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CLM",
                "codigo" => "1313",
                "denominacion" => "Gobi erno Autónomo Municipal de Colomi",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TUN",
                "codigo" => "1314",
                "denominacion" => "Gobi erno Autónomo Municipal de Villa Tunari",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PNT",
                "codigo" => "1315",
                "denominacion" => "Gobi erno Autónomo Municipal de Punata",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "VRV",
                "codigo" => "1316",
                "denominacion" => "Gobi erno Autónomo Municipal de Villa Rivero",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MEN",
                "codigo" => "1317",
                "denominacion" => "Gobi erno Autónomo Municipal de San Benito (Villa José Quintín Mendoza)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TAC",
                "codigo" => "1318",
                "denominacion" => "Gobi erno Autónomo Municipal de Tacachi",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "VGV",
                "codigo" => "1319",
                "denominacion" => "Gobi erno Autónomo Municipal Villa Gualberto Villarroel",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TRT",
                "codigo" => "1320",
                "denominacion" => "Gobi erno Autónomo Municipal de Tarata",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ANZ",
                "codigo" => "1321",
                "denominacion" => "Gobi erno Autónomo Municipal de Anzaldo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ARB",
                "codigo" => "1322",
                "denominacion" => "Gobi erno Autónomo Municipal de Arbieto",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SBB",
                "codigo" => "1323",
                "denominacion" => "Gobi erno Autónomo Municipal de Sacabamba",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CLI",
                "codigo" => "1324",
                "denominacion" => "Gobi erno Autónomo Municipal de Cliza",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TOC",
                "codigo" => "1325",
                "denominacion" => "Gobi erno Autónomo Municipal de Toco",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TLA",
                "codigo" => "1326",
                "denominacion" => "Gobi erno Autónomo Municipal de Tolata",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CAP",
                "codigo" => "1327",
                "denominacion" => "Gobi erno Autónomo Municipal de Capinota",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SAN",
                "codigo" => "1328",
                "denominacion" => "Gobi erno Autónomo Municipal de Santivañez",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SCY",
                "codigo" => "1329",
                "denominacion" => "Gobi erno Autónomo Municipal de Sicaya",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TAP",
                "codigo" => "1330",
                "denominacion" => "Gobi erno Autónomo Municipal de Tapacari",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TOT",
                "codigo" => "1331",
                "denominacion" => "Gobi erno Autónomo Municipal de Totora",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "POJ",
                "codigo" => "1332",
                "denominacion" => "Gobi erno Autónomo Municipal de Pojo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "POC",
                "codigo" => "1333",
                "denominacion" => "Gobi erno Autónomo Municipal de Pocona",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CHI",
                "codigo" => "1334",
                "denominacion" => "Gobi erno Autónomo Municipal de Chimoré",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PVI",
                "codigo" => "1335",
                "denominacion" => "Gobi erno Autónomo Municipal de Puerto Villarroel",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ARA",
                "codigo" => "1336",
                "denominacion" => "Gobi erno Autónomo Municipal de Arani",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "VAC",
                "codigo" => "1337",
                "denominacion" => "Gobi erno Autónomo Municipal de Vacas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ARQ",
                "codigo" => "1338",
                "denominacion" => "Gobi erno Autónomo Municipal de Arque",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TPY",
                "codigo" => "1339",
                "denominacion" => "Gobi erno Autónomo Municipal de Tacopaya",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "BOL",
                "codigo" => "1340",
                "denominacion" => "Gobi erno Autónomo Municipal de Bolivar",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TRQ",
                "codigo" => "1341",
                "denominacion" => "Gobi erno Autónomo Municipal de Tiraque",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MIZ",
                "codigo" => "1342",
                "denominacion" => "Gobi erno Autónomo Municipal de Mizque",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "VIS",
                "codigo" => "1343",
                "denominacion" => "Gobi erno Autónomo Municipal de Vila Vila",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ALA",
                "codigo" => "1344",
                "denominacion" => "Gobi erno Autónomo Municipal de Alalay",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ERI",
                "codigo" => "1345",
                "denominacion" => "Gobi erno Autónomo Municipal de Entre Rios",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CCT",
                "codigo" => "1346",
                "denominacion" => "Gobi erno Autónomo Municipal de Cocapata",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SHI",
                "codigo" => "1347",
                "denominacion" => "Gobi erno Autónomo Municipal de Shinahota",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Gobiernos Autónomos Municipales del Departamento de Oruro",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ORU",
                "codigo" => "1401",
                "denominacion" => "Gobierno Autónomo Municipal de Oruro",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CAR",
                "codigo" => "1402",
                "denominacion" => "Gobierno Autónomo Municipal de Caracollo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CHO",
                "codigo" => "1403",
                "denominacion" => "Gobierno Autónomo Municipal de El Choro",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CHT",
                "codigo" => "1404",
                "denominacion" => "Gobierno Autónomo Municipal de Challapata",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "STQ",
                "codigo" => "1405",
                "denominacion" => "Gobierno Autónomo Municipal de Santuario de Quillacas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "VHU",
                "codigo" => "1406",
                "denominacion" => "Gobierno Autónomo Municipal de Huanuni",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MAR",
                "codigo" => "1407",
                "denominacion" => "Gobierno Autónomo Municipal de Machacamarca",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "POO",
                "codigo" => "1408",
                "denominacion" => "Gobierno Autónomo Municipal de Poopó (Villa Poopó)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PAZ",
                "codigo" => "1409",
                "denominacion" => "Gobierno Autónomo Municipa de Pazña",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ANT",
                "codigo" => "1410",
                "denominacion" => "Gobierno Autónomo Municipa de Antequera",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EUC",
                "codigo" => "1411",
                "denominacion" => "Gobierno Autónomo Municipa de Eucaliptus",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SHU",
                "codigo" => "1412",
                "denominacion" => "Gobierno Autónomo Municipa de Santiago de Huari",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TTR",
                "codigo" => "1413",
                "denominacion" => "Gobierno Autónomo Municipal de Totora",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CRQ",
                "codigo" => "1414",
                "denominacion" => "Gobierno Autónomo Municipal de Corque",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CHE",
                "codigo" => "1415",
                "denominacion" => "Gobierno Autónomo Municipal de Choquecota",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CDC",
                "codigo" => "1416",
                "denominacion" => "Gobierno Autónomo Municipal de Curahuara de Carangas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TUR",
                "codigo" => "1417",
                "denominacion" => "Gobierno Autónomo Municipal de Turco",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "HCH",
                "codigo" => "1418",
                "denominacion" => "Gobierno Autónomo Municipal de Huachacalla",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ESA",
                "codigo" => "1419",
                "denominacion" => "Gobierno Autónomo Municipal de Escara",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CMA",
                "codigo" => "1420",
                "denominacion" => "Gobierno Autónomo Municipal de Cruz de Machacamarca",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "YUG",
                "codigo" => "1421",
                "denominacion" => "Gobierno Autónomo Municipal de Yunguyo de Litoral",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ESM",
                "codigo" => "1422",
                "denominacion" => "Gobierno Autónomo Municipal de Esmeralda",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TOL",
                "codigo" => "1423",
                "denominacion" => "Gobierno Autónomo Municipal de Toledo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ADN",
                "codigo" => "1424",
                "denominacion" => "Gobierno Autónomo Municipal de Andamarca (Santiago de Andamarca)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "BEL",
                "codigo" => "1425",
                "denominacion" => "Gobierno Autónomo Municipal de Belén de Andamarca",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SAL",
                "codigo" => "1426",
                "denominacion" => "Gobierno Autónomo Municipal de Salinas de Garci Mendoza",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PAM",
                "codigo" => "1427",
                "denominacion" => "Gobierno Autónomo Municipal de Pampa Aullagas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "RIV",
                "codigo" => "1428",
                "denominacion" => "Gobierno Autónomo Municipal de La Rivera",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TOS",
                "codigo" => "1429",
                "denominacion" => "Gobierno Autónomo Municipal de Todos Santos",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CGA",
                "codigo" => "1430",
                "denominacion" => "Gobierno Autónomo Municipal de Carangas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SAP",
                "codigo" => "1431",
                "denominacion" => "Gobierno Autónomo Municipal de Sabaya",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "COI",
                "codigo" => "1432",
                "denominacion" => "Gobierno Autónomo Municipal de Coipasa",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SDH",
                "codigo" => "1434",
                "denominacion" => "Gobierno Autónomo Municipal de Huayllamarca (Santiago de Huayllamarca)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SRC",
                "codigo" => "1435",
                "denominacion" => "Gobierno Autónomo Municipal de Soracachi",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Gobiernos Autónomos Municiales del Departamento de Potosí",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "POT",
                "codigo" => "1501",
                "denominacion" => "Gobierno Autónomo Municipal de Potosí",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TIN",
                "codigo" => "1502",
                "denominacion" => "Gobierno Autónomo Municipal de Tinguipaya",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "YOC",
                "codigo" => "1503",
                "denominacion" => "Gobierno Autónomo Municipal de Yocalla",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "URM",
                "codigo" => "1504",
                "denominacion" => "Gobierno Autónomo Municipal de Urmiri",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "UNC",
                "codigo" => "1505",
                "denominacion" => "Gobierno Autónomo Municipal de Uncía",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CHY",
                "codigo" => "1506",
                "denominacion" => "Gobierno Autónomo Municipal de Chayanta",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "LLA",
                "codigo" => "1507",
                "denominacion" => "Gobierno Autónomo Municipal de Llallagua",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "BET",
                "codigo" => "1508",
                "denominacion" => "Gobierno Autónomo Municipal de Betanzos",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CHQ",
                "codigo" => "1509",
                "denominacion" => "Gobierno Autónomo Municipal de Chaqui",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TCB",
                "codigo" => "1510",
                "denominacion" => "Gobierno Autónomo Municipal de Tacobamba",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CCQ",
                "codigo" => "1511",
                "denominacion" => "Gobierno Autónomo Municipal de Colquechaca",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "RAV",
                "codigo" => "1512",
                "denominacion" => "Gobierno Autónomo Municipal de Ravelo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PCT",
                "codigo" => "1513",
                "denominacion" => "Gobierno Autónomo Municipal de Pocoata",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "OCU",
                "codigo" => "1514",
                "denominacion" => "Gobierno Autónomo Municipal de Ocurí",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PED",
                "codigo" => "1515",
                "denominacion" => "Gobierno Autónomo Municipal de San Pedro de Buena Vista",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TTO",
                "codigo" => "1516",
                "denominacion" => "Gobierno Autónomo Municipal de Toro Toro",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "COT",
                "codigo" => "1517",
                "denominacion" => "Gobierno Autónomo Municipal de Cotagaita",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "VIT",
                "codigo" => "1518",
                "denominacion" => "Gobierno Autónomo Municipal de Vitichi",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TUP",
                "codigo" => "1519",
                "denominacion" => "Gobierno Autónomo Municipal de Tupiza",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ATO",
                "codigo" => "1520",
                "denominacion" => "Gobierno Autónomo Municipal de Atocha",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CCK",
                "codigo" => "1521",
                "denominacion" => "Gobierno Autónomo Municipal de Colcha\"K\" (Villa Martín)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PEQ",
                "codigo" => "1522",
                "denominacion" => "Gobierno Autónomo Municipal de San Pedro de Quemes",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PAB",
                "codigo" => "1523",
                "denominacion" => "Gobierno Autónomo Municipal de San Pablo de Lípez",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MOJ",
                "codigo" => "1524",
                "denominacion" => "Gobierno Autónomo Municipal de Mojinete",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SANT",
                "codigo" => "1525",
                "denominacion" => "Gobierno Autónomo Municipal de San Antonio de Esmoruco",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SAC",
                "codigo" => "1526",
                "denominacion" => "Gobierno Autónomo Municipal de Sacaca (Villa de Sacaca)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CRP",
                "codigo" => "1527",
                "denominacion" => "Gobierno Autónomo Municipal de Caripuyo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PUN",
                "codigo" => "1528",
                "denominacion" => "Gobierno Autónomo Municipal de Puna (Villa Talavera)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CAD",
                "codigo" => "1529",
                "denominacion" => "Gobierno Autónomo Municipal de Caiza \"D\"",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "UYU",
                "codigo" => "1530",
                "denominacion" => "Gobierno Autónomo Municipal de Uyuni",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TOM",
                "codigo" => "1531",
                "denominacion" => "Gobierno Autónomo Municipal de Tomave",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PRC",
                "codigo" => "1532",
                "denominacion" => "Gobierno Autónomo Municipal de Porco",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ARP",
                "codigo" => "1533",
                "denominacion" => "Gobierno Autónomo Municipal de Arampampa",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ACA",
                "codigo" => "1534",
                "denominacion" => "Gobierno Autónomo Municipal de Acasio",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "LLI",
                "codigo" => "1535",
                "denominacion" => "Gobierno Autónomo Municipal de Llica",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TAH",
                "codigo" => "1536",
                "denominacion" => "Gobierno Autónomo Municipal de Tahua",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "VLZ",
                "codigo" => "1537",
                "denominacion" => "Gobierno Autónomo Municipal de Villazón",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "AGU",
                "codigo" => "1538",
                "denominacion" => "Gobierno Autónomo Municipal de San Agustín",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CKO",
                "codigo" => "1539",
                "denominacion" => "Gobierno Autónomo Municipal de Ckochas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "JUC",
                "codigo" => "1540",
                "denominacion" => "Gobierno Autónomo Municipal de Chuquihuta Ayllu Jucumani",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Gobiernos Autónomos Municipales del Departamento de Tarija",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TRJ",
                "codigo" => "1601",
                "denominacion" => "Gobierno Autónomo Municipal de Tarija",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PCY",
                "codigo" => "1602",
                "denominacion" => "Gobierno Autónomo Municipal de Padcaya",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "BER",
                "codigo" => "1603",
                "denominacion" => "Gobierno Autónomo Municipal de Bermejo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "YCB",
                "codigo" => "1604",
                "denominacion" => "Gobierno Autónomo Municipal de Yacuiba",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CRY",
                "codigo" => "1605",
                "denominacion" => "Gobierno Autónomo Municipal de Caraparí",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MON",
                "codigo" => "1606",
                "denominacion" => "Gobierno Autónomo Municipal de Villamontes",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ORI",
                "codigo" => "1607",
                "denominacion" => "Gobierno Autónomo Municipal de Uriondo (Concepción)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "YUN",
                "codigo" => "1608",
                "denominacion" => "Gobierno Autónomo Municipal de Yunchara",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SLR",
                "codigo" => "1609",
                "denominacion" => "Gobierno Autónomo Municipal de San Lorenzo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TMY",
                "codigo" => "1610",
                "denominacion" => "Gobierno Autónomo Municipal de El Puente",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "RIO",
                "codigo" => "1611",
                "denominacion" => "Gobierno Autónomo Municipal de Entre Ríos",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Gobiernos Autónomos Municipales del Departamento de Santa Cruz",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SCZ",
                "codigo" => "1701",
                "denominacion" => "Gobierno Autónomo Municipal de Santa Cruz de La Sierra",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CTC",
                "codigo" => "1702",
                "denominacion" => "Gobierno Autónomo Municipal de Cotoca",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PRG",
                "codigo" => "1703",
                "denominacion" => "Gobierno Autónomo Municipal de Porongo (Ayacucho)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "LGU",
                "codigo" => "1704",
                "denominacion" => "Gobierno Autónomo Municipal de La Guardia",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TOR",
                "codigo" => "1705",
                "denominacion" => "Gobierno Autónomo Municipal de El Torno",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "WAR",
                "codigo" => "1706",
                "denominacion" => "Gobierno Autónomo Municipal de Warnes",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ING",
                "codigo" => "1707",
                "denominacion" => "Gobierno Autónomo Municipal de San Ignacio (San Ignacio de Velasco)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MIG",
                "codigo" => "1708",
                "denominacion" => "Gobierno Autónomo Municipal de San Miguel (San Miguel de Velasco)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "RAF",
                "codigo" => "1709",
                "denominacion" => "Gobierno Autónomo Municipal de San Rafael",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "BUE",
                "codigo" => "1710",
                "denominacion" => "Gobi erno Autónomo Municipa de Buena Vista",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CRL",
                "codigo" => "1711",
                "denominacion" => "Gobi erno Autónomo Municipa de San Carlos",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "YAP",
                "codigo" => "1712",
                "denominacion" => "Gobi erno Autónomo Municipa de Yapacaní",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "JOS",
                "codigo" => "1713",
                "denominacion" => "Gobi erno Autónomo Municipa de San José",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PAI",
                "codigo" => "1714",
                "denominacion" => "Gobi erno Autónomo Municipal de Pailón",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ROB",
                "codigo" => "1715",
                "denominacion" => "Gobi erno Autónomo Municipal de Roboré",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PCH",
                "codigo" => "1716",
                "denominacion" => "Gobi erno Autónomo Municipal de Portachuelo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SRS",
                "codigo" => "1717",
                "denominacion" => "Gobi erno Autónomo Municipal de Santa Rosa del Sara",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "LAG",
                "codigo" => "1718",
                "denominacion" => "Gobi erno Autónomo Municipal de Lagunillas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CAB",
                "codigo" => "1720",
                "denominacion" => "Gobi erno Autónomo Municipal de Cabezas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CUE",
                "codigo" => "1721",
                "denominacion" => "Gobi erno Autónomo Municipal de Cuevo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "GUT",
                "codigo" => "1722",
                "denominacion" => "Gobi erno Autónomo Municipal de Gutiérrez",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CMR",
                "codigo" => "1723",
                "denominacion" => "Gobi erno Autónomo Municipal de Camiri",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "BOY",
                "codigo" => "1724",
                "denominacion" => "Gobi erno Autónomo Municipal de Boyuibe",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "GRA",
                "codigo" => "1725",
                "denominacion" => "Gobi erno Autónomo Municipal de Vallegrande",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TRG",
                "codigo" => "1726",
                "denominacion" => "Gobi erno Autónomo Municipal de Trigal",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MOR",
                "codigo" => "1727",
                "denominacion" => "Gobi erno Autónomo Municipal de Moro Moro",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "POS",
                "codigo" => "1728",
                "denominacion" => "Gobi erno Autónomo Municipal de Postrer Valle",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PCR",
                "codigo" => "1729",
                "denominacion" => "Gobi erno Autónomo Municipal de Pucara",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SAM",
                "codigo" => "1730",
                "denominacion" => "Gobi erno Autónomo Municipal de Samaipata",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PAG",
                "codigo" => "1731",
                "denominacion" => "Gobi erno Autónomo Municipal de Pampa Grande",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MAY",
                "codigo" => "1732",
                "denominacion" => "Gobi erno Autónomo Municipal de Mairana",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "QRS",
                "codigo" => "1733",
                "denominacion" => "Gobi erno Autónomo Municipal de Quirusillas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MTR",
                "codigo" => "1734",
                "denominacion" => "Gobi erno Autónomo Municipal de Montero",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SAA",
                "codigo" => "1735",
                "denominacion" => "Gobi erno Autónomo Municipal de General Agustín Saavedra",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MIN",
                "codigo" => "1736",
                "denominacion" => "Gobi erno Autónomo Municipal de Mineros",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CON",
                "codigo" => "1737",
                "denominacion" => "Gobi erno Autónomo Municipal de Concepción",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SJA",
                "codigo" => "1738",
                "denominacion" => "Gobi erno Autónomo Municipal de San Javier",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "JUL",
                "codigo" => "1739",
                "denominacion" => "Gobi erno Autónomo Municipal de San Julián",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MAT",
                "codigo" => "1740",
                "denominacion" => "Gobi erno Autónomo Municipal de San Matías",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CMP",
                "codigo" => "1741",
                "denominacion" => "Gobi erno Autónomo Municipal de Comarapa",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SAI",
                "codigo" => "1742",
                "denominacion" => "Gobi erno Autónomo Municipal de Saipina",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SUA",
                "codigo" => "1743",
                "denominacion" => "Gobi erno Autónomo Municipal de Puerto Suárez",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PQO",
                "codigo" => "1744",
                "denominacion" => "Gobi erno Autónomo Municipal de Puerto Quijarro",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ADG",
                "codigo" => "1745",
                "denominacion" => "Gobi erno Autónomo Municipal de Ascención de Guarayos",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "URU",
                "codigo" => "1746",
                "denominacion" => "Gobi erno Autónomo Municipal de Urubicha",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PUE",
                "codigo" => "1747",
                "denominacion" => "Gobi erno Autónomo Municipal de El Puente",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "OKI",
                "codigo" => "1748",
                "denominacion" => "Gobi erno Autónomo Municipal de Okinawa Uno",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ANL",
                "codigo" => "1749",
                "denominacion" => "Gobi erno Autónomo Municipal de San Antonio de Lomerio",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SRA",
                "codigo" => "1750",
                "denominacion" => "Gobi erno Autónomo Municipal de San Ramón",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CRT",
                "codigo" => "1751",
                "denominacion" => "Gobi erno Autónomo Municipal de El Carmen Rivero Tórrez",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SJU",
                "codigo" => "1752",
                "denominacion" => "Gobi erno Autónomo Municipal de San Juan",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "FAL",
                "codigo" => "1753",
                "denominacion" => "Gobi erno Autónomo Municipal de Fernández Alonso",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PDR",
                "codigo" => "1754",
                "denominacion" => "Gobi erno Autónomo Municipal de San Pedro",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CCA",
                "codigo" => "1755",
                "denominacion" => "Gobi erno Autónomo Municipal de Cuatro Cañadas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CBE",
                "codigo" => "1756",
                "denominacion" => "Gobierno Autónomo Municipal de Colpa Bélgica",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Gobiernos Autónomos Municipales del Departamento de Beni",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TRI",
                "codigo" => "1801",
                "denominacion" => "Gobierno Autónomo Municipal de Trinidad",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "JAV",
                "codigo" => "1802",
                "denominacion" => "Gobierno Autónomo Municipal de San Javier",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "RIB",
                "codigo" => "1803",
                "denominacion" => "Gobierno Autónomo Municipal de Riberalta",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PGU",
                "codigo" => "1805",
                "denominacion" => "Gobierno Autónomo Municipal de Puerto Guayaramerín",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "REY",
                "codigo" => "1806",
                "denominacion" => "Gobierno Autónomo Municipal de Reyes",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "RUR",
                "codigo" => "1807",
                "denominacion" => "Gobierno Autónomo Municipal de Puerto Rurrenabaque",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "BOR",
                "codigo" => "1808",
                "denominacion" => "Gobierno Autónomo Municipal de San Borja",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ROS",
                "codigo" => "1809",
                "denominacion" => "Gobierno Autónomo Municipal de Santa Rosa",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ANA",
                "codigo" => "1810",
                "denominacion" => "Gobierno Autónomo Municipal de Santa Ana",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "IGN",
                "codigo" => "1811",
                "denominacion" => "Gobierno Autónomo Municipal de San Ignacio",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "LOR",
                "codigo" => "1812",
                "denominacion" => "Gobierno Autónomo Municipal de Loreto",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SAD",
                "codigo" => "1813",
                "denominacion" => "Gobierno Autónomo Municipal de San Andrés",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "JOA",
                "codigo" => "1814",
                "denominacion" => "Gobierno Autónomo Municipal de San Joaquín",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "RAM",
                "codigo" => "1815",
                "denominacion" => "Gobierno Autónomo Municipal de San Ramón",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SIL",
                "codigo" => "1816",
                "denominacion" => "Gobierno Autónomo Municipal de Puerto Síles",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MAG",
                "codigo" => "1817",
                "denominacion" => "Gobierno Autónomo Municipal de Magdalena",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "BAU",
                "codigo" => "1818",
                "denominacion" => "Gobierno Autónomo Municipal de Baures",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "HUA",
                "codigo" => "1819",
                "denominacion" => "Gobierno Autónomo Municipal de Huacaraje",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EXA",
                "codigo" => "1820",
                "denominacion" => "Gobierno Autónomo Municipal de Exaltación",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Gobiernos Autónomos Municipales del Departamento de Pando",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CBJ",
                "codigo" => "1901",
                "denominacion" => "Gobierno Autónomo Municipal de Cobija",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PRV",
                "codigo" => "1902",
                "denominacion" => "Gobierno Autónomo Municipal de Porvenir",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "BOP",
                "codigo" => "1903",
                "denominacion" => "Gobierno Autónomo Municipal de Bolpebra",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "FLO",
                "codigo" => "1904",
                "denominacion" => "Gobierno Autónomo Municipal de Bella Flor",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PRI",
                "codigo" => "1905",
                "denominacion" => "Gobierno Autónomo Municipal de Puerto Rico",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SPE",
                "codigo" => "1906",
                "denominacion" => "Gobierno Autónomo Municipal de San Pedro",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "FIL",
                "codigo" => "1907",
                "denominacion" => "Gobierno Autónomo Municipal de Filadelfia",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "PGM",
                "codigo" => "1908",
                "denominacion" => "Gobierno Autónomo Municipal de Puerto Gonzalo Moreno",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SLO",
                "codigo" => "1909",
                "denominacion" => "Gobierno Autónomo Municipal de San Lorenzo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SEN",
                "codigo" => "1910",
                "denominacion" => "Gobierno Autónomo Municipal de Sena",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SRO",
                "codigo" => "1911",
                "denominacion" => "Gobierno Autónomo Municipal de Santa Rosa del Abuná",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "HUM",
                "codigo" => "1912",
                "denominacion" => "Gobierno Autónomo Municipal de Ingavi (Humaita)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "NES",
                "codigo" => "1913",
                "denominacion" => "Gobierno Autónomo Municipal de Nueva Esperanza",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "LOM",
                "codigo" => "1914",
                "denominacion" => "Gobierno Autónomo Municipal de Villa Nueva (Loma Alta)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "MER",
                "codigo" => "1915",
                "denominacion" => "Gobierno Autónomo Municipal de Santos Mercado",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "GAIOC",
                "codigo" => "0",
                "denominacion" => "GOBIERNOS AUTÓNOMOS INDÍGENAS ORIGINARIOS CAMPESINOS  ",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Departamento de Cochabamba  ",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "TRP",
                "codigo" => "3301",
                "denominacion" => "Gobierno Autónomo Indígena Originario Campesino del Territorio de Raqaypampa  ",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Departamento de Oruro  ",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "URU",
                "codigo" => "3401",
                "denominacion" => "Gobierno Autónomo Indígena Originario Campesino de la Nación Originaria Uru Chipaya  ",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Departamento de Santa Cruz  ",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CHIY",
                "codigo" => "3701",
                "denominacion" => "Gobierno Autónomo Indígena Originario Campesino de Charagua Iyambae  ",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "APF",
                "codigo" => "0",
                "denominacion" => "ADMINISTRACIÓN PÚBLICA FINANCIERA",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "IFNB",
                "codigo" => "0",
                "denominacion" => "Instituciones Financieras No Bancarias",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Instituciones Financieras No Bancarias del Nivel Central del Estado",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Planificación del Desarrollo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "FNDR",
                "codigo" => "862",
                "denominacion" => "Fondo Nacional de Desarrollo Regional",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "FONDESIF",
                "codigo" => "865",
                "denominacion" => "Fondo de Desarrollo del Sistema Financiero y Apoyo al Sector Productivo (*) Tuición: Ministerio de Minería y Metalurgia",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "FOFIM",
                "codigo" => "130",
                "denominacion" => "Fondo de Financiamiento para la Minería Instituciones Financieras No Bancarias del Nivel Territorial",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "FRFPR",
                "codigo" => "867",
                "denominacion" => "Fondo Rotatorio de Fomento Productivo Regional",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "IFB",
                "codigo" => "0",
                "denominacion" => "Instituciones Financieras Bancarias",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Economía y Finanzas Públicas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "BCB",
                "codigo" => "951",
                "denominacion" => "Banco Central de Bolivia (*)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "APRV",
                "codigo" => "0",
                "denominacion" => "ADMINISTRACIÓN PRIVADA",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SPRV",
                "codigo" => "0",
                "denominacion" => "SECTOR PRIVADO",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SEC-PRV",
                "codigo" => "999",
                "denominacion" => "Sector Privado ENTIDADES DESCENTRALIZADAS Y EMPRESAS DE LAS ENTIDADES TERRITORIALES AUTONOMAS (**)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EMP-REG",
                "codigo" => "0",
                "denominacion" => "EMPRESAS REGIONALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Ministerio de Hidrocarburos",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EMTAGAS",
                "codigo" => "716",
                "denominacion" => "Empresa Tarijeña del Gas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EMP-DEP",
                "codigo" => "0",
                "denominacion" => "EMPRESAS DEPARTAMENTALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Gobierno Autónomo Departamental de La Paz",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EDALP",
                "codigo" => "2319",
                "denominacion" => "Empresa Pública Departamental Estratégica de Aguas - La Paz Tuición: Gobierno Autónomo Departamental de Oruro",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EPDEOR",
                "codigo" => "634",
                "denominacion" => "Empresa Pública Departamental Hotel Terminal - Terminal de Buses de Oruro Tuición: Gobierno Autónomo Departamental de Potosí",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "FCCCP-EPD",
                "codigo" => "2336",
                "denominacion" => "Empresa Pública Departamental Fábrica de Calaminas y Clavos Tuición: Gobierno Autónomo Departamental de Tarija",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SETAR",
                "codigo" => "2330",
                "denominacion" => "Empresa Pública Departamental de Servicios Eléctricos Tarija-SETAR",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EMP-MUN",
                "codigo" => "0",
                "denominacion" => "EMPRESAS MUNICIPALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Gobierno Autónomo Municipal de Sucre",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ELAPAS",
                "codigo" => "802",
                "denominacion" => "Empresa Local de Agua Potable y Alcantarillado Sucre",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EMAV-S",
                "codigo" => "2314",
                "denominacion" => "Empresa Municipal de Áreas Verdes Sucre Tuición: Gobierno Autónomo Municipal de La Paz",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SAMAPA",
                "codigo" => "761",
                "denominacion" => "Servicio Autónomo Municipal de Agua Potable y Alcantarillado",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EMAVERDE",
                "codigo" => "2316",
                "denominacion" => "Empresa Municipal de Áreas Verdes, Parques y Forestación",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EMAVIAS",
                "codigo" => "2317",
                "denominacion" => "Empresa Municipal de Asfaltos y Vías Tuición: Gobierno Autónomo Municipal de Viacha",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EMAPAV",
                "codigo" => "2312",
                "denominacion" => "Empresa Municipal de Agua Potable y Alcantarillado Viacha Tuición: Gobierno Autónomo Municipal de Copacabana",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EPSA MUNICIPAL",
                "codigo" => "2338",
                "denominacion" => "Empresa Prestadora de Servicio de Agua Potable y Alcantarillado Tuición: Gobierno Autónomo Municipal de Cochabamba",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SEMAPA",
                "codigo" => "781",
                "denominacion" => "Servicio Municipal de Agua Potable y Alcantarillado",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EMAVRA",
                "codigo" => "2303",
                "denominacion" => "Empresa Municipal de Áreas Verdes y Recreación Alternativa",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EMSA",
                "codigo" => "2315",
                "denominacion" => "Empresa Municipal de Servicios de Aseo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Gobierno Autónomo Municipal de Sacaba",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "GERES",
                "codigo" => "2301",
                "denominacion" => "Empresa Municipal de Gestión de Residuos Sólidos",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EMAPAS",
                "codigo" => "2302",
                "denominacion" => "Empresa Municipal de Agua Potable y Alcantarillado Sacaba",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Gobierno Autónomo Municipal de Oruro",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SELA",
                "codigo" => "831",
                "denominacion" => "Servicio Local de Acueductos y Alcantarillado - Oruro",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Gobierno Autónomo Municipal de Potosí",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "AAPOS",
                "codigo" => "821",
                "denominacion" => "Administración Autónoma para Obras Sanitarias - Potosí",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Gobierno Autónomo Municipal de Yacuiba",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EMAPYC",
                "codigo" => "2327",
                "denominacion" => "Empresa Municipal Autónoma de Agua Potable y Alcantarillado de Yacuiba",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ORI",
                "codigo" => "0",
                "denominacion" => "Tuición: Gobierno Autónomo Municipal de Uriondo (Concepción)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EMAPAU",
                "codigo" => "2328",
                "denominacion" => "Empresa Municipal de Agua Potable y Alcantarillado Sanitario de Uriondo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Gobierno Autónomo Municipal de Cobija",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EPSA COBIJA",
                "codigo" => "2320",
                "denominacion" => "Empresa Pública Municipal de Servicios de Agua Potable y Alcantarillado Sanitario Cobija",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "ENTIDADES DESCENTRALIZADAS DEPARTAMENTALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Gobierno Autónomo Departamental de Santa Cruz",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "CIAT",
                "codigo" => "171",
                "denominacion" => "Centro de Investigación Agrícola Tropical",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "SEARPI",
                "codigo" => "2311",
                "denominacion" => "Servicio de Encauzamiento de Ríos (SEARPI)",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "ENTIDADES DESCENTRALIZADAS MUNICIPALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Gobierno Autónomo Municipal de Sucre",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EMAS",
                "codigo" => "2313",
                "denominacion" => "Entidad Municipal de Aseo Urbano Sucre",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Gobierno Autónomo Municipal de La Paz",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EDMTB",
                "codigo" => "2331",
                "denominacion" => "Entidad Descentralizada Municipal Terminal de Buses La Paz",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EDMME",
                "codigo" => "2334",
                "denominacion" => "Entidad Descentralizada Municipal de Maquinaria y Equipo",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EDMCLP",
                "codigo" => "2337",
                "denominacion" => "Entidad Descentralizada Municipal de Cementerios de La Paz",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Gobierno Autónomo Municipal de Cochabamba",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "UMMIPRE PROMAN",
                "codigo" => "2318",
                "denominacion" => "Entidad Descentralizada UMMIPRE PROMAN",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Gobierno Autónomo Municipal de Potosí",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EMAP",
                "codigo" => "2335",
                "denominacion" => "Entidad Municipal de Aseo Potosí",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EMUJOYAS",
                "codigo" => "2339",
                "denominacion" => "Empresa Municipal Fabrica de Joyas",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "0",
                "denominacion" => "Tuición: Gobierno Autónomo Municipal de Tarija",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EMAF",
                "codigo" => "2322",
                "denominacion" => "Entidad Matadero Frigorífico Municipal de Tarija",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "EMAT",
                "codigo" => "2323",
                "denominacion" => "Entidad Aseo Municipal de Tarija",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "OPUM",
                "codigo" => "2324",
                "denominacion" => "Entidad Obras Públicas Municipales de Tarija",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "OTE",
                "codigo" => "2325",
                "denominacion" => "Entidad de Ordenamiento Territorial de Tarija",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "OSEC",
                "codigo" => "2326",
                "denominacion" => "Entidad Orden y Seguridad Ciudadana Municipal de Tarija",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "ETBT",
                "codigo" => "2333",
                "denominacion" => "Entidad de Dirección de la Terminal de Buses de Tarija",
                "descripcion" => "-",
                "fk_id_clasificador" => 1
            ],
            [
                "sigla" => "-",
                "codigo" => "11000",
                "denominacion" => "INGRESOS DE OPERACIÓN",
                "descripcion" => "Comprende los ingresos que provienen de la venta de bienes y/o servicios que produce una institución,\nrelacionados con el objeto principal de su actividad. Los mismos son percibidos por el sector público\nempresarial y el sector público financiero. No corresponde deducir las comisiones y bonificaciones\naplicadas de acuerdo con la política comercial, las mismas que deben ser consideradas como gastos de\ncomercialización.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "11100",
                "denominacion" => "Venta de Bienes",
                "descripcion" => "Recursos generados por la venta bruta de bienes, efectuada por las empresas públicas.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "11300",
                "denominacion" => "Venta de Servicios",
                "descripcion" => "Recursos generados por la venta bruta de servicios, realizada por las empresas públicas.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "11400",
                "denominacion" => "Alquiler de Edificios y/o Equipos",
                "descripcion" => "Recursos generados por el alquiler a terceros, de edificios, maquinaria y/o equipos que\npertenecen a las empresas públicas.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "11500",
                "denominacion" => "Ingresos Financieros de Instituciones Financieras",
                "descripcion" => "Recursos que perciben las instituciones financieras bancarias y no bancarias, por la generación de\nintereses al otorgar créditos en el mercado financiero, producto de intermediación financiera,\ndepósitos a la vista, a plazo, de ahorro y otros.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "11900",
                "denominacion" => "Otros Ingresos de Operación",
                "descripcion" => "Recursos provenientes de actividades no comprendidas anteriormente, relacionadas con las\natribuciones institucionales, como ser: comercialización de envases, materiales de desechos y\notros.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "12000",
                "denominacion" => "VENTA DE BIENES Y SERVICIOS DE LAS ADMINISTRACIONES PÚBLICAS",
                "descripcion" => "Ingresos por la venta de bienes y/o servicios de los Órganos del Estado Plurinacional, Entidades de Control\ny Defensa del Estado Plurinacional, Entidades Territoriales, Instituciones de Seguridad Social, Universidades\nPúblicas e Instituciones Públicas Descentralizadas.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "12100",
                "denominacion" => "Venta de Bienes de las Administraciones Públicas",
                "descripcion" => "Recursos que son generados por la venta de bienes por parte de las entidades de la administración\npública no empresariales.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "12200",
                "denominacion" => "Venta de Servicios de las Administraciones Públicas",
                "descripcion" => "Recursos que son generados por la venta de servicios por parte de las entidades de la\nadministración pública no empresariales. Incluye el cobro de importes por formularios, impresos\ny otros que utilizan las instituciones públicas para: registro, identificación, autorizaciones y otros.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13000",
                "denominacion" => "INGRESOS POR IMPUESTOS",
                "descripcion" => "Recaudaciones por impuestos establecidos en el Sistema Tributario vigente, percibidos exclusivamente\npor el Tesoro General de la Nación y Entidades Territoriales Autónomas según sus competencias.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13100",
                "denominacion" => "Impuestos Internos (Renta Interna)",
                "descripcion" => "Ingresos tributarios que proceden de pagos que realizan las personas, las entidades públicas,\nprivadas y mixtas al Estado Plurinacional, por concepto de impuestos sobre la renta, utilidades y\notros administrados por el Servicio de Impuestos Nacionales, de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19230",
                "denominacion" => "De las Entidades Territoriales Autónomas",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19231",
                "denominacion" => "Del Gobierno Autónomo Departamental",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13110",
                "denominacion" => "Impuesto sobre las Utilidades de las Empresas",
                "descripcion" => "Recursos provenientes de la tributación sobre las utilidades de las empresas públicas,\nprivadas y mixtas resultantes de los Estados Financieros al cierre de cada gestión, además\nde gravar a profesionales liberales u oficios y beneficiarios del exterior, de acuerdo a lo\nestablecido en la normativa vigente. Incluye también los recursos provenientes de las\nalícuotas adicionales, de acuerdo a lo establecido en la normativa vigente.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13111",
                "denominacion" => "En Efectivo",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13112",
                "denominacion" => "En Certificados de Crédito Fiscal",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13120",
                "denominacion" => "Impuesto a las Transacciones",
                "descripcion" => "Recursos provenientes del gravamen impositivo sobre los ingresos brutos devengados\ndurante el período fiscal a personas jurídicas y naturales, cuyas actividades se realizan en\nel territorio nacional por el ejercicio del comercio, industria, profesión, oficio, negocio,\nalquiler de bienes muebles o inmuebles, obras o servicios de cualquier índole,\ntransferencia a título gratuito de bienes muebles, inmuebles y derechos, y otras,\nlucrativas o no, de acuerdo a lo establecido en la normativa vigente.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13121",
                "denominacion" => "En Efectivo",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13122",
                "denominacion" => "En Certificados de Crédito Fiscal",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13130",
                "denominacion" => "Impuesto al Valor Agregado - Mercado Interno",
                "descripcion" => "Recursos provenientes del gravamen impositivo sobre la venta de bienes o mercaderías\nen general, contratos de obra, servicios técnicos y profesionales, servicios públicos y\nprivados, aportes, alquileres de muebles e inmuebles y todo otro tipo de ingreso, por\nactividades realizadas en el país.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13131",
                "denominacion" => "En Efectivo",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13132",
                "denominacion" => "En Certificados de Crédito Fiscal",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13140",
                "denominacion" => "Impuesto al Valor Agregado - Importaciones",
                "descripcion" => "Recursos provenientes del gravamen a la importación definitiva de mercancías.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13141",
                "denominacion" => "En Efectivo",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13142",
                "denominacion" => "En Certificados de Crédito Fiscal",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13150",
                "denominacion" => "Impuesto a los Consumos Específicos - Mercado Interno",
                "descripcion" => "Recursos originados en el impuesto por concepto de fabricación, consumo o adquisición\nde bebidas alcohólicas, no alcohólicas y refrescantes, alcoholes sin desnaturalizar,\ncigarrillos y tabacos y vehículos automóviles.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13151",
                "denominacion" => "En Efectivo",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13152",
                "denominacion" => "En Certificados de Crédito Fiscal",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13160",
                "denominacion" => "Impuesto a los Consumos Específicos - Importaciones",
                "descripcion" => "Recursos provenientes de la aplicación del Impuesto a los Consumos Específicos a la\nimportación definitiva de cigarrillos y tabacos, de bebidas alcohólicas, no alcohólicas y\nrefrescantes, alcoholes sin desnaturalizar y vehículos automóviles.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13161",
                "denominacion" => "En Efectivo",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13162",
                "denominacion" => "En Certificados de Crédito Fiscal",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13170",
                "denominacion" => "Impuestos a los Hidrocarburos",
                "descripcion" => "Recursos originados por la tributación a la comercialización en el mercado interno de\nhidrocarburos y sus derivados, sean estos producidos internamente o importados. Incluye\nlos recursos originados por la producción de Hidrocarburos en el territorio nacional.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13171",
                "denominacion" => "Impuesto Especial a los Hidrocarburos y sus Derivados Mercado Interno – En\nEfectivo",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13172",
                "denominacion" => "Impuesto Especial a los Hidrocarburos y sus Derivados Mercado Interno – En\nCertificados de Crédito Fiscal",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13175",
                "denominacion" => "Impuesto Directo a los Hidrocarburos",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13190",
                "denominacion" => "Otros Impuestos",
                "descripcion" => "Recursos provenientes de gravámenes impositivos por conceptos no descritos\nanteriormente.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13191",
                "denominacion" => "13191 Régimen Complementario al IVA – RC IVA",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13192",
                "denominacion" => "13192 Impuesto a las Salidas Aéreas al Exterior - ISAE",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13193",
                "denominacion" => "13193 Impuesto a la Transmisión Gratuita de Bienes - ITGB",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13194",
                "denominacion" => "13194 Régimen Agropecuario Unificado - RAU",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13195",
                "denominacion" => "13195 Régimen Tributario Simplificado - RTS",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13196",
                "denominacion" => "13196 Régimen Tributario Integrado - STI",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13197",
                "denominacion" => "13197 En Certificados de Crédito Fiscal",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13198",
                "denominacion" => "13198 Impuesto a las Transacciones Financieras - ITF",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13199",
                "denominacion" => "13199 Impuestos a la Participación en Juegos, a la Venta de Moneda Extranjera y Otros",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13200",
                "denominacion" => "Impuestos Aduaneros (Renta Aduanera)",
                "descripcion" => "Recursos que provienen del gravamen por importación de mercancía que ingrese a recintos aduaneros,\nsobre el valor CIF Frontera o CIF Aduana, de acuerdo al medio de transporte utilizado.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13210",
                "denominacion" => "Gravamen Arancelario",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13211",
                "denominacion" => "En Efectivo",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13212",
                "denominacion" => "En Certificados de Crédito Fiscal",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13300",
                "denominacion" => "Impuestos Municipales",
                "descripcion" => "Ingresos tributarios por el pago que realizan las personas jurídicas y naturales por la tenencia de\nbienes y otros establecidos de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13310",
                "denominacion" => "Impuesto a la Propiedad de Bienes Inmuebles",
                "descripcion" => "Recursos provenientes del impuesto que grava la propiedad de bienes inmuebles situada\nen el territorio nacional, de acuerdo a normativa tributaria vigente.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13330",
                "denominacion" => "Impuesto a la Propiedad de Vehículos Automotores",
                "descripcion" => "Recursos provenientes del impuesto que grava la propiedad de vehículos automotores de\ncualquier clase o categoría, de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13360",
                "denominacion" => "Impuesto Municipal a la Transferencia de Inmuebles",
                "descripcion" => "Recursos provenientes del impuesto que grava la transferencia onerosa de bienes\ninmuebles, de acuerdo a normativa tributaria vigente.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13370",
                "denominacion" => "Impuesto Municipal a la Transferencia de Vehículos Automotores",
                "descripcion" => "Recursos provenientes del impuesto que grava la transferencia onerosa de vehículos\nautomotores, de acuerdo a normativa tributaria vigente.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13390",
                "denominacion" => "Otros",
                "descripcion" => "Recursos provenientes de gravámenes impositivos municipales no clasificados\nanteriormente.\nRecursos provenientes del impuesto que grava al consumo específico sobre la chicha de\nmaíz y la afectación del medio ambiente por vehículos automotores, de acuerdo a\nnormativa tributaria vigente.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13400",
                "denominacion" => "Impuestos Departamentales",
                "descripcion" => "Ingresos tributarios por el cobro de los impuestos de dominio tributario departamental, en el\nmarco de la normativa tributaria vigente.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19232",
                "denominacion" => "Del Gobierno Autónomo Municipal",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19233",
                "denominacion" => "Del Gobierno Autónomo Indígena Originario Campesino",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19234",
                "denominacion" => "Del Gobierno Autónomo Regional",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13410",
                "denominacion" => "Impuesto a la Sucesión Hereditaria y Donación de Bienes Inmuebles y Muebles Sujetos a\nRegistro Público",
                "descripcion" => "Recursos provenientes del impuesto que grava a la sucesión hereditaria y donación de\nbienes inmuebles y muebles sujetos a registro público, de acuerdo a la normativa\ntributaria vigente.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13420",
                "denominacion" => "Impuesto a la Propiedad de Vehículos a motor para la navegación Aérea y Acuática",
                "descripcion" => "Recursos provenientes del impuesto que grava a la propiedad de vehículos a motor para\nnavegación aérea y acuática, de acuerdo a normativa tributaria vigente.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13430",
                "denominacion" => "Impuesto a la afectación del Medio Ambiente",
                "descripcion" => "Recurso proveniente del impuesto que grava a la afectación del medio ambiente, excepto\nlas causadas por vehículos automotores y por actividades hidrocarburíferas, mineras y de\nelectricidad; siempre y cuando no constituyan infracciones ni delitos.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "13490",
                "denominacion" => "Otros",
                "descripcion" => "Recursos provenientes de gravámenes impositivos departamentales no clasificadores\nanteriormente.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "14000",
                "denominacion" => "REGALIAS",
                "descripcion" => "Recursos que percibe el Estado Plurinacional por la explotación de recursos agropecuarios, forestales,\nyacimientos mineros, petrolíferos y otros, clasificados según la naturaleza de la actividad que origina el derecho de su percepción.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "14100",
                "denominacion" => "Regalías Mineras",
                "descripcion" => "Recursos que percibe el Estado Plurinacional por la explotación de yacimientos mineros.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "14200",
                "denominacion" => "Regalías por Hidrocarburos",
                "descripcion" => "Recursos que percibe el Estado Plurinacional por la explotación de yacimientos petrolíferos, los\nque son clasificados de acuerdo al alcance del impuesto, sea este nacional o departamental.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "14210",
                "denominacion" => "Nacionales",
                "descripcion" => "Recursos provenientes de regalías por la producción de hidrocarburos que se\ncomercializan en todo el país.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "14212",
                "denominacion" => "6% Participación TGN",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "14220",
                "denominacion" => "Departamentales",
                "descripcion" => "Recursos provenientes de regalías por la producción departamental fiscalizada de\nhidrocarburos, de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "14221",
                "denominacion" => "11% Regalías Departamentales",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "14222",
                "denominacion" => "1% Regalía Compensatoria Departamental",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "14300",
                "denominacion" => "Regalías Agropecuarias y Forestales",
                "descripcion" => "Recursos que percibe el Estado Plurinacional como resultado de su acción impositiva en la\nexplotación de recursos agropecuarios y forestales.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "14900",
                "denominacion" => "Otras Regalías",
                "descripcion" => "Recursos que percibe el Estado Plurinacional como resultado de su acción impositiva en la\nexplotación de otros recursos naturales.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "15000",
                "denominacion" => "TASAS, DERECHOS Y OTROS INGRESOS",
                "descripcion" => "Recursos provenientes de fuentes no impositivas como ser tasas, derechos, patentes y concesiones,\ncontribuciones por mejoras, multas y otros. Se efectúan con contraprestación y tienen carácter de no\nrecuperables.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "15100",
                "denominacion" => "Tasas",
                "descripcion" => "Recursos generados por la prestación efectiva de un servicio público individualizado en el\ncontribuyente a solicitud o recepción obligatoria del mismo, así como el arancel de derechos\nreales, valores judiciales, el registro civil, licencias de conducir, arancel de valores fiscales, de\nservicios forenses en general y otros. Asimismo, incluye las tasas pagadas por las personas\nnaturales o jurídicas, nacionales o extranjeras, por la realización de actividades petroleras tales\ncomo: transporte, refinación e industrialización y distribución de gas natural por redes. Incluye las\ntasas de regulación percibidas por las Entidades competentes.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "15200",
                "denominacion" => "Derechos",
                "descripcion" => "Recursos que recaudan las entidades públicas por derechos administrativos otorgados a terceros,\ncomo matrículas, registros e inscripciones y otros.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "15300",
                "denominacion" => "Patentes y Concesiones",
                "descripcion" => "Recursos que se originan por la explotación forestal, petrolera, minera y otros, así como\nlos percibidos de personas jurídicas y naturales por la realización de actividades\neconómicas de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "15310",
                "denominacion" => "Patentes Forestales",
                "descripcion" => "Recursos percibidos por la explotación forestal y los permisos de desmonte.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "15320",
                "denominacion" => "Patentes Petroleras",
                "descripcion" => "Derechos realizados por las empresas del sector hidrocarburos por las áreas sujetas a\ncontrato de riesgo compartido para exploración, explotación y comercialización de\nhidrocarburos.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "15330",
                "denominacion" => "Patentes y Concesiones Mineras",
                "descripcion" => "Recursos que se perciben por la explotación de recursos mineralógicos.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "15331",
                "denominacion" => "Patentes Mineras",
                "descripcion" => "Recursos percibidos por el mantenimiento de vigencia del derecho concesionario.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "15332",
                "denominacion" => "Concesiones Mineras",
                "descripcion" => "Retribución por el derecho real y exclusivo de realizar por un periodo de tiempo\nactividades de prospección, exploración, explotación, concentración, fundición,\nrefinación y comercialización de todas las substancias minerales, incluidos los\ndesmontes, escorias, relaves y cualesquier otros residuos mineros o metalúrgicos.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "15340",
                "denominacion" => "Patentes Municipales",
                "descripcion" => "Recursos que se perciben por el uso y aprovechamiento de bienes de dominio público y\nla realización de actividades económicas desarrolladas en una determinada jurisdicción\nmunicipal.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "15350",
                "denominacion" => "Otras Patentes y Concesiones",
                "descripcion" => "Otras patentes y concesiones no especificadas en los rubros precedentes.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "15400",
                "denominacion" => "Contribuciones por Mejoras",
                "descripcion" => "Recursos originados en aportes de la comunidad para la ejecución de obras de mejoramiento\npúblico.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "15900",
                "denominacion" => "Otros Ingresos",
                "descripcion" => "Otros ingresos no tributarios no especificados en los rubros precedentes, tales como multas,\nintereses penales, ganancias por diferencias de cambio, renta consular y otros ingresos no\nespecificados.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "15910",
                "denominacion" => "Multas",
                "descripcion" => "Recursos que se generan por concepto de sanciones pecuniarias originadas en el\nincumplimiento del ordenamiento legal vigente como las multas por infracciones al\nReglamento de Tránsito, mora en el pago de tributos, evasión fiscal, incumplimiento de\ndeberes formales y otros. Las multas por retrasos en el pago de impuestos, deben incluirse\ncon el impuesto que se trate.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "15920",
                "denominacion" => "Intereses Penales",
                "descripcion" => "Recursos que provienen como sanción por la morosidad, tardanza y/o procesos, en el\npago de obligaciones pecuniarias.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "15930",
                "denominacion" => "Ganancias en Operaciones Cambiarias",
                "descripcion" => "Recursos que se originan por operaciones con divisas extranjeras o con mantenimiento\nde valor por incremento o disminución del tipo de cambio.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "15940",
                "denominacion" => "Renta Consular",
                "descripcion" => "Recursos generados en aplicación del arancel consular por la venta de valores fiscales\n(timbres consulares, pasaportes, formularios para registro civil, nacionalidad de las\npersonas y otros), percibidos por los consulados acreditados en el exterior del país.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19260",
                "denominacion" => "De las Instituciones de Seguridad Social",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19270",
                "denominacion" => "De las Empresas Públicas Nacionales",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "15990",
                "denominacion" => "Otros Ingresos no Especificados",
                "descripcion" => "Incluye aportes para vivienda efectuados a favor del Consejo Nacional de Vivienda Policial,\nrecursos generados por remates de madera decomisada, depósitos judiciales que se han\nconsolidado a favor del Órgano Judicial con sentencia ejecutoriada y otros ingresos no\nespecificados en los rubros precedentes.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "16000",
                "denominacion" => "INTERESES Y OTRAS RENTAS DE LA PROPIEDAD",
                "descripcion" => "Recursos provenientes de arrendamientos, alquileres, intereses, dividendos y derechos derivados de la\npropiedad de activos como tierras y terrenos, edificios, maquinaria, equipos, activos intangibles y\nfinancieros, de propiedad de las entidades públicas.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "16100",
                "denominacion" => "Intereses",
                "descripcion" => "Recursos obtenidos por el uso del dinero y otros créditos financieros otorgados en préstamo.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "16110",
                "denominacion" => "Intereses por Depósitos",
                "descripcion" => "Recursos provenientes de intereses por depósitos bancarios y otros efectuados por las\ninstituciones públicas en el sistema financiero, de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "16120",
                "denominacion" => "Intereses por Valores",
                "descripcion" => "Recursos provenientes de intereses por inversiones financieras en valores como acciones,\ncertificados y otros, de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "16140",
                "denominacion" => "Intereses por Inversiones en instrumentos financieros en el extranjero",
                "descripcion" => "Recursos provenientes de los intereses generados por la inversión de recursos del TGN en\ninstrumentos financieros en el extranjero.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "16190",
                "denominacion" => "Otros Intereses",
                "descripcion" => "Recursos provenientes de intereses no clasificados anteriormente.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "16200",
                "denominacion" => "Dividendos",
                "descripcion" => "Recursos percibidos por distribución de utilidades, provenientes de inversiones por aportes de\ncapital en instituciones financieras, empresas públicas, privadas y/o mixtas.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "16300",
                "denominacion" => "Alquiler de Edificios, Tierras y Terrenos",
                "descripcion" => "Recursos que se originan por el alquiler de edificios, arrendamiento de tierras y terrenos, a terceros, de propiedad de las entidades públicas y que no son utilizados en sus actividades ordinarias.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "16400",
                "denominacion" => "Derechos sobre Bienes Intangibles",
                "descripcion" => "Recursos provenientes del uso por parte de terceros de bienes intangibles de propiedad de las\nentidades públicas, como los derechos de autor, marcas, fórmulas, llaves y patentes.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "16500",
                "denominacion" => "Alquiler de Equipos de las Administraciones Públicas",
                "descripcion" => "Recursos generados por el alquiler de maquinaria y/o equipos, a terceros, que pertenecen a las\nentidades de la administración pública no empresariales.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "17000",
                "denominacion" => "CONTRIBUCIONES A LA SEGURIDAD SOCIAL",
                "descripcion" => "Recursos que se generan en pagos, por concepto de aportes patronales, laborales y otros destinados a las\nentidades de seguridad social, con el fin de proporcionar a los asegurados prestaciones médicas y económicas,\nde acuerdo a normativa vigente.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "17100",
                "denominacion" => "Contribuciones Obligatorias",
                "descripcion" => "Recursos generados en pagos al Sistema de Seguridad Social, administrados por las Cajas de Salud\ny otras entidades, de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "17110",
                "denominacion" => "Patronales",
                "descripcion" => "Recursos provenientes de contribuciones obligatorias al Sistema de Seguridad Social que\naportan los empleadores, de acuerdo con disposiciones legales en materia de Seguridad\nSocial.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "17111",
                "denominacion" => "Del Sector Público",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "17112",
                "denominacion" => "Del Sector Privado",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "17120",
                "denominacion" => "Laborales",
                "descripcion" => "Recursos provenientes de aportes obligatorios al Sistema de Seguridad Social de toda\npersona afiliada a un ente del Sistema de Seguridad Social.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "17121",
                "denominacion" => "Del Sector Público",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "17122",
                "denominacion" => "Del Sector Privado",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "17130",
                "denominacion" => "Especiales de las Universidades Públicas",
                "descripcion" => "Recursos provenientes de las Universidades Públicas al Sistema de Seguridad Social de\nacuerdo a normativa vigente.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "17200",
                "denominacion" => "Contribuciones Voluntarias",
                "descripcion" => "Recursos que se originan en aportes voluntarios realizados por personas naturales y jurídicas.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "18000",
                "denominacion" => "DONACIONES CORRIENTES",
                "descripcion" => "Recursos que provienen de países, organismos y entidades residentes y no residentes en el país, en calidad\nde donación de naturaleza voluntaria, sin contraprestación de bienes o servicios por parte de la entidad\nreceptora y aplicable a gasto corriente.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "18100",
                "denominacion" => "Donaciones Corrientes Internas",
                "descripcion" => "Recursos percibidos en calidad de donación, de residentes en el país, destinados a gastos corrientes.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "18110",
                "denominacion" => "Del Sector Privado Nacional realizados por personas naturales y jurídicas.",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "18111",
                "denominacion" => "Monetizables",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "18212",
                "denominacion" => "No Monetizable",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "18220",
                "denominacion" => "De Países y Organismos Internacionales",
                "descripcion" => "Recursos provenientes de donaciones recibidas de países y organismos internacionales\naplicables a gastos corrientes. Comprende las donaciones en sus modalidades oficial,\ndirecta y no oficial o unilateral, monetizables y no monetizables.\nLa monetización se produce por la venta de una donación recibida en bienes, dicha\noperación debe estar señalada específicamente en los convenios entre el donante y el\nbeneficiario, además de identificar el tipo de donación recibido. Las donaciones no\nmonetizables son aquellas que se reciben en bienes o servicios.\nLas donaciones recibidas en efectivo, deben quedar registradas como donaciones\nmonetizables de acuerdo al tipo de donación.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "18221",
                "denominacion" => "Monetizable",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "18222",
                "denominacion" => "No Monetizable",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19000",
                "denominacion" => "TRANSFERENCIAS CORRIENTES",
                "descripcion" => "Recursos que provienen de transferencias del sector público o privado, no sujetos a contraprestación en\nbienes y/o servicios en cumplimiento a disposiciones legales y contractuales previstas, destinados a gastos corrientes.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19100",
                "denominacion" => "Del Sector Privado",
                "descripcion" => "Recursos provenientes de transferencias corrientes por subsidios o subvenciones del sector\nprivado.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19110",
                "denominacion" => "De Unidades Familiares",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19120",
                "denominacion" => "De Instituciones Privadas sin Fines de Lucro",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19130",
                "denominacion" => "De Empresas Privadas",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19200",
                "denominacion" => "Del Sector Público No Financiero",
                "descripcion" => "Recursos provenientes de transferencias corrientes por subsidios, subvenciones, coparticipación\ntributaria del sector público no financiero.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19210",
                "denominacion" => "Del Órgano Ejecutivo",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19211",
                "denominacion" => "Por Subsidios o Subvenciones",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19212",
                "denominacion" => "Por Coparticipación Tributaria",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19216",
                "denominacion" => "Fondo de Compensación Departamental",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19219",
                "denominacion" => "Por Emisión de Certificados de Crédito Fiscal",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19220",
                "denominacion" => "De los Órganos Legislativo, Judicial y Electoral, Entidades de Control y Defensa,\nDescentralizadas y Universidades",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19271",
                "denominacion" => "Por Subsidios y Subvenciones",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19272",
                "denominacion" => "Por Excedentes Financieros",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19280",
                "denominacion" => "De las Empresas Públicas Territoriales",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19281",
                "denominacion" => "Del Gobierno Autónomo Departamental",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19282",
                "denominacion" => "Del Gobierno Autónomo Municipal",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19283",
                "denominacion" => "Del Gobierno Autónomo Indígena Originario Campesino",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19284",
                "denominacion" => "Del Gobierno Autónomo Regional",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19300",
                "denominacion" => "Del Sector Público Financiero",
                "descripcion" => "Recursos provenientes de transferencias corrientes de las Instituciones Públicas Financieras\nBancarias y No Bancarias.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19310",
                "denominacion" => "De las Instituciones Públicas Financieras No Bancarias",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19320",
                "denominacion" => "De las Instituciones Públicas Financieras Bancarias",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "19400",
                "denominacion" => "Del Exterior",
                "descripcion" => "Recursos provenientes de transferencias corrientes del exterior.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "21000",
                "denominacion" => "RECURSOS PROPIOS DE CAPITAL",
                "descripcion" => "Recursos que se generan como resultado de la venta de activos fijos (edificios, maquinaria y equipo,\nsemovientes, tierras y terrenos y otros) o intangibles propiedad de las entidades públicas.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "21100",
                "denominacion" => "Venta de Activos Fijos",
                "descripcion" => "Recursos originados por la venta de activos fijos.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "21110",
                "denominacion" => "Edificios",
                "descripcion" => "Recursos provenientes por la venta de edificios y otras construcciones.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "21120",
                "denominacion" => "Maquinaria y Equipo",
                "descripcion" => "Recursos provenientes por la venta de maquinaria y equipo de oficina, de producción,\nequipos agropecuarios, industriales, de transporte en general, energía, riego, frigoríficos,\nde comunicaciones, médicos, odontológicos, educativos y otros.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "21121",
                "denominacion" => "Equipo de Oficina y Muebles",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "21122",
                "denominacion" => "Maquinaria y Equipo de Producción",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "21123",
                "denominacion" => "Equipo de Transporte, Tracción y Elevación",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "21124",
                "denominacion" => "Equipo Médico y de Laboratorio",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "21125",
                "denominacion" => "Equipo de Comunicación",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "21126",
                "denominacion" => "Equipo Educacional y Recreativo",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "21127",
                "denominacion" => "Otra Maquinaria y Equipo",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "21130",
                "denominacion" => "Semovientes",
                "descripcion" => "Recursos provenientes por la venta de ganado de diferentes especies.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "21200",
                "denominacion" => "Venta de Tierras y Terrenos",
                "descripcion" => "Recursos originados por la venta de tierras y terrenos (excluye las estructuras o construcciones).",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "21400",
                "denominacion" => "Venta de Activos Intangibles",
                "descripcion" => "Recursos originados por la venta de Activos Intangibles, tales como la venta de patentes, derechos\nde autor, marcas registradas, programas de computación y otros.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "21900",
                "denominacion" => "Venta de Otros Activos Fijos",
                "descripcion" => "Recursos originados por la venta de otros activos no descritos anteriormente.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "22000",
                "denominacion" => "DONACIONES DE CAPITAL",
                "descripcion" => "Recursos percibidos por el sector público de organismos internos y externos en calidad de donación de\ncarácter voluntario, sin contraprestación de bienes o servicios por parte de la entidad receptora,\ndestinados a financiar gastos de capital.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "22100",
                "denominacion" => "Donaciones de Capital Internas",
                "descripcion" => "Recursos provenientes de donaciones de capital de instituciones residentes en el país.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "22110",
                "denominacion" => "Del Sector Privado Nacional realizados por personas naturales y jurídicas.",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "22111",
                "denominacion" => "Monetizables",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "22112",
                "denominacion" => "No Monetizable",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "22200",
                "denominacion" => "Donaciones de Capital del Exterior",
                "descripcion" => "Recursos provenientes de donaciones de instituciones no residentes en el país.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "22210",
                "denominacion" => "Del Sector Privado del Exterior",
                "descripcion" => "Recursos provenientes de donaciones recibidas del sector privado del exterior, destinados\na financiar los gastos de capital.\nComprende las donaciones monetizables y no monetizables, la monetización se produce\npor la venta de una donación recibida en bienes, dicha operación debe estar señalada\nespecíficamente en los convenios entre el donante y el beneficiario. Las donaciones no\nmonetizables son aquellas que se reciben en bienes o servicios.\nLas donaciones recibidas en efectivo deben quedar registradas como donaciones\nmonetizables.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "22211",
                "denominacion" => "Monetizable",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "22212",
                "denominacion" => "No Monetizable",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "22220",
                "denominacion" => "De Países y Organismos Internacionales",
                "descripcion" => "Recursos provenientes de donaciones recibidas de países y organismos internacionales\ndestinados a financiar los gastos de capital.\nComprende las donaciones en sus modalidades oficial, directa y no oficial o unilateral,\nmonetizables y no monetizables, la monetización se produce por la venta de una donación\nrecibida en bienes, dicha operación debe estar señalada específicamente en los convenios\nentre el donante y el beneficiario. Las donaciones no monetizables son aquellas que se\nreciben en bienes o servicios. Las donaciones recibidas en efectivo deben quedar\nregistradas como donaciones monetizables, de acuerdo al tipo de donación.\nIncluye las donaciones recibidas de países y organismos internacionales que se originan\npor concepto del alivio de deuda externa, en el marco de la Iniciativa para Países\nAltamente Endeudados (HIPC), cuyos recursos están destinados a cubrir gastos de la Ley\ndel Dialogo Nacional 2000 N° 2235 de 31 de julio de 2001.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "22221",
                "denominacion" => "Monetizable",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "22222",
                "denominacion" => "No Monetizable",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "22223",
                "denominacion" => "Donaciones HIPC",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23000",
                "denominacion" => "TRANSFERENCIAS DE CAPITAL",
                "descripcion" => "Recursos que provienen del sector público o privado, sin contraprestación de bienes o servicios por parte\nde la entidad receptora, estos recursos se destinarán a financiar gastos de capital (formación de capital y/o adquisición de activos financieros).",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23100",
                "denominacion" => "Del Sector Privado",
                "descripcion" => "Recursos provenientes de transferencias de capital del sector privado.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23110",
                "denominacion" => "De Unidades Familiares",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23111",
                "denominacion" => "Monetizable",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23112",
                "denominacion" => "No Monetizable",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23120",
                "denominacion" => "De Instituciones Privadas sin Fines de Lucro",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23121",
                "denominacion" => "Monetizable",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23122",
                "denominacion" => "No Monetizable",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23130",
                "denominacion" => "De Empresas Privadas",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23131",
                "denominacion" => "Monetizable",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23132",
                "denominacion" => "No Monetizable",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "37122",
                "denominacion" => "No Monetizable",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "37200",
                "denominacion" => "Obtención de Préstamos del Exterior a Largo Plazo",
                "descripcion" => "Recursos contratados con instituciones financieras no residentes en el país, cuyo vencimiento es\nmayor a un año.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23200",
                "denominacion" => "Del Sector Público No Financiero",
                "descripcion" => "Recursos provenientes de transferencias de capital de los Órganos del Estado Plurinacional,\nEntidades de Control y Defensa del Estado, Instituciones Públicas Descentralizadas, Universidades\nPúblicas, Entidades Territoriales, Instituciones de Seguridad Social y Empresas Públicas.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23210",
                "denominacion" => "Del Órgano Ejecutivo",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23211",
                "denominacion" => "Por Subsidios o Subvenciones",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23212",
                "denominacion" => "Por Patentes Petroleras",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23219",
                "denominacion" => "En Certificados de Crédito Fiscal",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23220",
                "denominacion" => "De los Órganos Legislativo, Judicial y Electoral, Entidades de Control y Defensa,\nDescentralizadas y Universidades",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23230",
                "denominacion" => "De las Entidades Territoriales Autónomas",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23231",
                "denominacion" => "Del Gobierno Autónomo Departamental",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23232",
                "denominacion" => "Del Gobierno Autónomo Municipal",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23233",
                "denominacion" => "Del Gobierno Autónomo Indígena Originario Campesino",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23234",
                "denominacion" => "Del Gobierno Autónomo Regional",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23260",
                "denominacion" => "De las Instituciones de Seguridad Social",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23270",
                "denominacion" => "De las Empresas Públicas Nacionales",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23271",
                "denominacion" => "Por Subsidios y Subvenciones",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23272",
                "denominacion" => "Por Excedentes Financieros",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23280",
                "denominacion" => "De las Empresas Públicas Territoriales",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23281",
                "denominacion" => "Del Gobierno Autónomo Departamental",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23282",
                "denominacion" => "Del Gobierno Autónomo Municipal",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23283",
                "denominacion" => "Del Gobierno Autónomo Indígena Originario Campesino",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23284",
                "denominacion" => "Del Gobierno Autónomo Regional",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23300",
                "denominacion" => "Del Sector Público Financiero",
                "descripcion" => "Recursos que reciben los organismos del sector público como transferencias de capital,\nprovenientes de Instituciones Públicas Financieras Bancarias y No Bancarias.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23310",
                "denominacion" => "De las Instituciones Públicas Financieras No Bancarias",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23320",
                "denominacion" => "De las Instituciones Públicas Financieras Bancarias",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23400",
                "denominacion" => "Del Exterior",
                "descripcion" => "Recursos provenientes de transferencias de capital del exterior",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "31000",
                "denominacion" => "VENTA DE ACCIONES Y PARTICIPACIONES DE CAPITAL",
                "descripcion" => "Recursos provenientes por la venta de acciones y cuotas partes de capital de otras empresas públicas o\nprivadas, nacionales o internacionales, registradas en su oportunidad en la cuenta de Acciones y\nParticipaciones de Capital.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "31100",
                "denominacion" => "De Empresas Privadas Nacionales",
                "descripcion" => "Recursos provenientes por la venta de acciones y cuotas partes de capital en empresas privadas\nnacionales.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "31200",
                "denominacion" => "De Empresas Públicas",
                "descripcion" => "Recursos generados por la venta de acciones y cuotas partes de capital en empresas públicas.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "31210",
                "denominacion" => "De las Empresas Públicas Nacionales",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "31220",
                "denominacion" => "De las Empresas Públicas Departamentales",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "31230",
                "denominacion" => "De las Empresas Públicas Municipales",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "31240",
                "denominacion" => "De las Empresas Públicas Regionales",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "31250",
                "denominacion" => "De las Empresas Públicas Indígena Originaria Campesina",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "31300",
                "denominacion" => "De Instituciones Públicas Financieras",
                "descripcion" => "Recursos provenientes por la venta de acciones y cuotas partes de capital en instituciones públicas\nfinancieras bancarias y no bancarias.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "31310",
                "denominacion" => "De las Instituciones Públicas Financieras No Bancarias",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "31320",
                "denominacion" => "De las Instituciones Públicas Financieras Bancarias",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "31400",
                "denominacion" => "Del Exterior",
                "descripcion" => "Recursos provenientes por la venta de acciones y cuotas partes de capital en entidades\ninternacionales y otras del sector externo.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "31410",
                "denominacion" => "De Organismos Internacionales",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "31420",
                "denominacion" => "Otras del Exterior",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "32000",
                "denominacion" => "RECUPERACION DE PRÉSTAMOS DE CORTO PLAZO",
                "descripcion" => "Recursos originados por la recuperación de préstamos a corto plazo otorgados al sector privado, público\ny externo, registrados en su oportunidad en la cuenta Concesión de Préstamos a Corto Plazo.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "32100",
                "denominacion" => "Del Sector Privado",
                "descripcion" => "Recursos generados en la recuperación de préstamos a corto plazo otorgados al sector privado.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "32200",
                "denominacion" => "Del Sector Público No Financiero",
                "descripcion" => "Recursos producto de la recuperación de préstamos a corto plazo otorgados al sector público no\nfinanciero.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "32210",
                "denominacion" => "Del Órgano Ejecutivo",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "32211",
                "denominacion" => "En Efectivo",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "32212",
                "denominacion" => "En Certificados de Crédito Fiscal",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "32220",
                "denominacion" => "De los Órganos Legislativo, Judicial y Electoral, Entidades de Control y Defensa,\nDescentralizadas y Universidades",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "32230",
                "denominacion" => "De las Entidades Territoriales Autónomas",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "32231",
                "denominacion" => "Del Gobierno Autónomo Departamental",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "32232",
                "denominacion" => "Del Gobierno Autónomo Municipal",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "32233",
                "denominacion" => "Del Gobierno Autónomo Indígena Originario Campesino",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "32234",
                "denominacion" => "Del Gobierno Autónomo Regional",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "32260",
                "denominacion" => "De las Instituciones de Seguridad Social",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "32270",
                "denominacion" => "De las Empresas Públicas Nacionales",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "32280",
                "denominacion" => "De las Empresas Públicas Territoriales",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "32281",
                "denominacion" => "Del Gobierno Autónomo Departamental",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "32282",
                "denominacion" => "Del Gobierno Autónomo Municipal",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "32283",
                "denominacion" => "Del Gobierno Autónomo Indígena Originario Campesino",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "32284",
                "denominacion" => "Del Gobierno Autónomo Regional",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "32300",
                "denominacion" => "Del Sector Público Financiero",
                "descripcion" => "Recursos generados en la recuperación de préstamos de corto plazo otorgados a instituciones\nfinancieras bancarias y no bancarias.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "32310",
                "denominacion" => "De las Instituciones Públicas Financieras No Bancarias",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "32320",
                "denominacion" => "De las Instituciones Públicas Financieras Bancarias",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "32400",
                "denominacion" => "Del Exterior",
                "descripcion" => "Recursos generados en la recuperación de préstamos de corto plazo, otorgados a organismos no\nresidentes en el país.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "23000",
                "denominacion" => "Alquileres",
                "descripcion" => "Gastos por alquileres de bienes muebles, inmuebles, equipos, maquinarias y otros de propiedad\nde terceros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "33000",
                "denominacion" => "RECUPERACION DE PRÉSTAMOS DE LARGO PLAZO",
                "descripcion" => "Recursos originados por la recuperación de préstamos de largo plazo otorgados a los sectores privado,\npúblico y externo; registrados en oportunidad de su imputación en la partida Concesión de Préstamos a\nLargo Plazo. Asimismo, incluye las recuperaciones por afectaciones al Tesoro General de la Nación.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "33100",
                "denominacion" => "Del Sector Privado",
                "descripcion" => "Recursos generados en la recuperación de préstamos a largo plazo otorgados al sector privado.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "33200",
                "denominacion" => "Del Sector Público No Financiero",
                "descripcion" => "Recursos generados en la recuperación de préstamos a largo plazo del sector público no financiero.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "33210",
                "denominacion" => "Del Órgano Ejecutivo",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "33211",
                "denominacion" => "En Efectivo",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "33212",
                "denominacion" => "En Certificados de Crédito Fiscal",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "33220",
                "denominacion" => "De los Órganos Legislativo, Judicial y Electoral, Entidades de Control y Defensa,\nDescentralizadas y Universidades",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "33230",
                "denominacion" => "De las Entidades Territoriales Autónomas",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "33231",
                "denominacion" => "Del Gobierno Autónomo Departamental",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "33232",
                "denominacion" => "Del Gobierno Autónomo Municipal",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "33233",
                "denominacion" => "Del Gobierno Autónomo Indígena Originario Campesino",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "33234",
                "denominacion" => "Del Gobierno Autónomo Regional",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "33260",
                "denominacion" => "De las Instituciones de Seguridad Social",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "33270",
                "denominacion" => "De las Empresas Públicas Nacionales",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "33280",
                "denominacion" => "De las Empresas Públicas Territoriales",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "33281",
                "denominacion" => "Del Gobierno Autónomo Departamental",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "33282",
                "denominacion" => "Del Gobierno Autónomo Municipal",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "33283",
                "denominacion" => "Del Gobierno Autónomo Indígena Originario Campesino",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "33284",
                "denominacion" => "Del Gobierno Autónomo Regional",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "33300",
                "denominacion" => "Del Sector Público Financiero",
                "descripcion" => "Recursos generados en la recuperación de préstamos de largo plazo otorgados a Instituciones\nPúblicas Financieras Bancarias y No Bancarias.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "33310",
                "denominacion" => "De las Instituciones Públicas Financieras No Bancarias",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "33320",
                "denominacion" => "De las Instituciones Públicas Financieras Bancarias",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "33400",
                "denominacion" => "Recuperación de Fondos de Fideicomiso y Servicios Financieros",
                "descripcion" => "Recursos que se originan en la recuperación de fondos de fideicomisos y servicios financieros.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "33410",
                "denominacion" => "De las Instituciones Públicas",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "33420",
                "denominacion" => "De las Instituciones Privadas",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "33500",
                "denominacion" => "Del Exterior",
                "descripcion" => "Recursos generados en la recuperación de préstamos de largo plazo, otorgados a organismos no\nresidentes en el país.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "33600",
                "denominacion" => "Recuperaciones por Afectaciones al Tesoro General de la Nación",
                "descripcion" => "Recuperaciones por concepto de afectaciones realizadas a las cuentas fiscales del Tesoro General\nde la Nación, y por transacciones sin movimiento de efectivo, efectuadas por cuenta de las\nentidades del sector público y privado.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "34000",
                "denominacion" => "VENTA DE TÍTULOS Y VALORES",
                "descripcion" => "Recursos originados por la venta de títulos y valores registrados en su oportunidad como Inversión\nFinanciera que no otorgan propiedad sobre el patrimonio de los entes emisores, ni reconocen derechos\nal valor residual y a la renta residual de las sociedades.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "34100",
                "denominacion" => "Venta de Títulos y Valores de Corto Plazo",
                "descripcion" => "Recursos originados por la venta de títulos y valores a corto plazo que significan disminución de\nla inversión financiera, cuyo vencimiento está consignado en un plazo menor a doce meses.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "34110",
                "denominacion" => "Letras del Tesoro",
                "descripcion" => "Recursos originados en la venta de letras de tesorería efectuada por el tenedor (entidad\npública) y que significan pasivos del emisor, cuyo vencimiento es menor a doce meses a\npartir de la emisión de los mismos.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "34120",
                "denominacion" => "Bonos del Tesoro",
                "descripcion" => "Recursos originados en la venta de bonos del tesoro efectuada por el tenedor (entidad\npública) y que significan pasivos del emisor, cuyo vencimiento es menor a doce meses a\npartir de la emisión de los mismos.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "34130",
                "denominacion" => "Otros",
                "descripcion" => "Recursos originados en la venta de otros títulos y valores que no correspondan a letras ni\na bonos del tesoro, cuyo vencimiento es menor a doce meses a partir de la emisión de los\nmismos.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "34200",
                "denominacion" => "Venta de Títulos y Valores de Largo Plazo",
                "descripcion" => "Recursos originados por la venta de títulos y valores a largo plazo que significan disminución de la\ninversión financiera, cuyo vencimiento está consignado en un plazo mayor a doce meses.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "34210",
                "denominacion" => "Letras del Tesoro",
                "descripcion" => "Recursos originados en la venta de letras de tesorería efectuada por el tenedor (entidad\npública) y que significan pasivos del emisor, cuyo vencimiento es mayor a doce meses, a\npartir de la emisión de los mismos.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "34220",
                "denominacion" => "Bonos del Tesoro",
                "descripcion" => "Recursos originados en la venta de bonos del tesoro efectuada por el tenedor (entidad\npública) y que significan pasivos del emisor, cuyo vencimiento es mayor a doce meses, a\npartir de la emisión de los mismos.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "34230",
                "denominacion" => "Otros",
                "descripcion" => "Recursos originados en la venta de otros títulos y valores que no correspondan a letras ni\na bonos del tesoro, cuyo vencimiento es mayor a doce meses, a partir de la emisión de los\nmismos.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "35000",
                "denominacion" => "DISMINUCIÓN Y COBRO DE OTROS ACTIVOS FINANCIEROS",
                "descripcion" => "Fuentes financieras que se originan en la disminución neta de saldos de cuentas del activo disponible y\ndel activo exigible que constituyen las instituciones públicas. Incluye el cobro de recursos devengados no\ncobrados en gestiones anteriores aplicados por el Sector Público.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "35100",
                "denominacion" => "Disminución del Activo Disponible",
                "descripcion" => "Fuentes financieras que se originan en la disminución neta de los saldos de caja y bancos e\ninversiones temporales.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "35110",
                "denominacion" => "Disminución de Caja y Bancos",
                "descripcion" => "Fuentes financieras que se originan en la disminución neta de saldos de caja y bancos.\nResulta de comparar los saldos iníciales y finales de caja y bancos que están determinados\npor las magnitudes de recibos y pagos de las instituciones públicas.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "35120",
                "denominacion" => "Disminución de Inversiones Temporales",
                "descripcion" => "Fuentes financieras que se originan en la disminución neta de saldos de inversiones\ntemporales. Esta cuenta indica el uso de fondos como consecuencia de mayores\nnecesidades de financiamiento de caja.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "35130",
                "denominacion" => "Disminución de Anticipos Financieros",
                "descripcion" => "Recursos que se originan por concepto de pagos por adelantado que realiza una entidad\npública, en aplicación de cláusulas contractuales en la contratación de bienes y servicios.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "CCC",
                "codigo" => "529",
                "denominacion" => "Corporación de Créditos de Mercaderías (EE.UU.)",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "-",
                "codigo" => "35200",
                "denominacion" => "Disminución de Cuentas y Documentos por Cobrar y Otros Activos Financieros a Corto Plazo",
                "descripcion" => "Fuentes financieras que se originan en la disminución neta de cuentas del activo exigible y otros\nactivos financieros a corto plazo documentada y no documentada que constituye una institución\npública. Su cálculo es consecuencia de políticas financieras de cobros. Estos recursos no\ncorresponden al Sector Público.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "35210",
                "denominacion" => "Disminución de Cuentas por Cobrar a Corto Plazo",
                "descripcion" => "Fuentes financieras que se originan en la disminución neta de saldos de las cuentas por\ncobrar a corto plazo.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "35220",
                "denominacion" => "Disminución de Documentos por Cobrar y Otros Activos Financieros a Corto Plazo",
                "descripcion" => "Fuentes financieras que se originan en la disminución neta de saldos de documentos y\nefectos por cobrar y otros activos financieros a corto plazo. Incluye las variaciones netas\nde saldos de anticipos financieros, activos diferidos y débitos por apertura de cartas de\ncrédito a corto plazo.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "35221",
                "denominacion" => "Disminución de documentos por cobrar a corto plazo",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "35222",
                "denominacion" => "Disminución de otros Activos financieros a corto plazo",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "35300",
                "denominacion" => "Disminución de Cuentas y Documentos por Cobrar y Otros Activos Financieros a Largo Plazo",
                "descripcion" => "Fuentes financieras que se originan en la disminución neta de cuentas del activo exigible y otros\nactivos financieros a largo plazo documentada y no documentada que constituye una institución\npública. Su cálculo es consecuencia de políticas financieras de cobros. Estos recursos no\ncorresponden al Sector Público.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "35310",
                "denominacion" => "Disminución de Cuentas por Cobrar a Largo Plazo",
                "descripcion" => "Fuentes financieras que se originan en la disminución neta de saldos de las cuentas por\ncobrar a largo plazo.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "35320",
                "denominacion" => "Disminución de Documentos por Cobrar y Otros Activos Financieros a Largo Plazo",
                "descripcion" => "Fuentes financieras que se originan en la disminución neta de saldos de documentos y\nefectos por cobrar y otros activos financieros a largo plazo. Incluye activos diferidos y\ndébitos por apertura de cartas de crédito a largo plazo.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "35321",
                "denominacion" => "Disminución de documentos por cobrar a largo plazo",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "35322",
                "denominacion" => "Disminución de otros Activos financieros a largo plazo",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "35400",
                "denominacion" => "Cobro de Cuentas y Documentos por Cobrar y Otros Activos Financieros a Corto Plazo",
                "descripcion" => "Recursos que se originan en el cobro de cuentas del activo y otros activos financieros a corto plazo,\ndocumentada y no documentada que constituye una institución pública, por recursos devengados\nno cobrados en gestiones pasadas. Estos recursos son presupuestados por las entidades públicas,\nexcepto el Órgano Ejecutivo.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "35410",
                "denominacion" => "Recursos Devengados no Cobrados por Cuentas por Cobrar de Corto Plazo",
                "descripcion" => "Recursos que se originan en el cobro de cuentas por cobrar a corto plazo.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "35420",
                "denominacion" => "Recursos Devengados no Cobrados por Documentos por Cobrar y Otros Activos\nFinancieros a Corto Plazo",
                "descripcion" => "Recursos que se originan en el cobro de documentos y efectos por cobrar y otros activos\na corto plazo.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "36000",
                "denominacion" => "OBTENCIÓN DE PRÉSTAMOS INTERNOS Y DE FONDOS - FIDEICOMISOS",
                "descripcion" => "Recursos generados en la realización de operaciones de crédito público interno a corto y largo plazo,\nefectuado por una institución pública, con instituciones financieras bancarias y no bancarias residentes\nen el país, prevista en el ordenamiento legal vigente. Asimismo, comprende el financiamiento por\nafectaciones al Tesoro General de la Nación.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "36100",
                "denominacion" => "Obtención de Préstamos Internos a Corto Plazo",
                "descripcion" => "Recursos contratados con instituciones financieras, con vencimiento menor a un año. Incluye la\nemisión de certificados de crédito fiscal del Tesoro General de la Nación.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "36110",
                "denominacion" => "En Efectivo",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "36120",
                "denominacion" => "En Certificados de Crédito Fiscal",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "36200",
                "denominacion" => "Obtención de Préstamos Internos a Largo Plazo",
                "descripcion" => "Recursos contratados con instituciones financieras bancarias y no bancarias residentes en el país, cuyo vencimiento es mayor a un año.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "36210",
                "denominacion" => "En Efectivo",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "36220",
                "denominacion" => "En Certificados de Crédito Fiscal",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "36300",
                "denominacion" => "Obtención de Fondos en Fideicomiso",
                "descripcion" => "Comprenden los recursos recibidos por la institución fiduciaria por concepto de fondos en calidad\nde fideicomiso y que serán utilizados en fines que determine el fideicomitente de acuerdo a\ndisposiciones legales pertinentes. Incluye los recursos otorgados por el fiduciario al beneficiario,\ncon una finalidad específica.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "36310",
                "denominacion" => "Obtención de Fondos - Fideicomiso a Corto Plazo",
                "descripcion" => "Recursos generados en la percepción de recursos en calidad de fondos en fideicomiso para\nser devueltos en un plazo menor a doce meses.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "36320",
                "denominacion" => "Obtención de Fondos - Fideicomiso a Largo Plazo",
                "descripcion" => "Recursos generados en la percepción de recursos en calidad de fondos en fideicomiso para\nser devueltos en un plazo mayor a doce meses.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "36400",
                "denominacion" => "Financiamiento por Afectaciones al Tesoro General de la Nación",
                "descripcion" => "Financiamientos originados por afectaciones a las cuentas fiscales del Tesoro General de la\nNación, y por transacciones sin movimiento de efectivo, que implican una obligación con el Tesoro\nGeneral de la Nación.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "37000",
                "denominacion" => "OBTENCIÓN DE PRÉSTAMOS DEL EXTERIOR",
                "descripcion" => "Recursos generados en la realización de operaciones de préstamos externos a corto y largo plazo,\nefectuado por una institución pública, con entidades financieras no residentes en el país, prevista\nde acuerdo a normativa vigente.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "37100",
                "denominacion" => "Obtención de Préstamos del Exterior a Corto Plazo",
                "descripcion" => "Recursos contratados con instituciones financieras no residentes en el país, cuyo vencimiento es\nmenor a un año.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "37110",
                "denominacion" => "Del Sector Privado del Exterior",
                "descripcion" => "Recursos provenientes de préstamos a corto plazo recibidos del sector privado del\nexterior. Comprende los préstamos monetizables y no monetizables. La monetización del\npréstamo significa la venta de bienes recibidos como parte del préstamo; esta operación\ndebe estar acordada expresamente en el contrato de préstamo. Los préstamos no\nmonetizables se pactan en bienes o servicios. Los préstamos en efectivo deben quedar\nregistrados como monetizables.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "37111",
                "denominacion" => "Monetizable",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "37112",
                "denominacion" => "No Monetizable",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "37120",
                "denominacion" => "De Países y Organismos Internacionales",
                "descripcion" => "Recursos provenientes de préstamos a corto plazo recibidos de países y organismos\ninternacionales. Comprende los préstamos monetizables y no monetizables. La\nmonetización del préstamo significa la venta de bienes recibidos como parte del\npréstamo; esta operación debe estar acordada expresamente en el contrato de préstamo. Los préstamos no monetizables se pactan en bienes o servicios. Los préstamos en efectivo\ndeben quedar registrados como monetizables.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "37121",
                "denominacion" => "Monetizable",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "37210",
                "denominacion" => "Del Sector Privado del Exterior",
                "descripcion" => "Recursos provenientes de préstamos a largo plazo recibidos del sector privado del\nexterior. Comprende los préstamos monetizables y no monetizables. La monetización del\npréstamo significa la venta de bienes recibidos como parte del préstamo; esta operación\ndebe estar acordada expresamente en el contrato de préstamo. Los préstamos no\nmonetizables se pactan en bienes o servicios. Los préstamos en efectivo deben quedar\nregistrados como monetizables.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "37211",
                "denominacion" => "Monetizable",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "37212",
                "denominacion" => "No Monetizable",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "37220",
                "denominacion" => "De Países y Organismos Internacionales",
                "descripcion" => "Recursos provenientes de préstamos a largo plazo recibidos de países y organismos\ninternacionales.\nComprende los préstamos monetizables y no monetizables. La monetización del préstamo\nsignifica la venta de bienes recibidos como parte del préstamo; esta operación debe estar\nacordada expresamente en el contrato de préstamo.\nLos préstamos no monetizables se pactan en bienes o servicios. Los préstamos en efectivo\ndeben quedar registrados como monetizables.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "37221",
                "denominacion" => "Monetizable",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "37222",
                "denominacion" => "No Monetizable",
                "descripcion" => "",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "38000",
                "denominacion" => "EMISIÓN DE TÍTULOS DE DEUDA",
                "descripcion" => "Recursos generados por la emisión de títulos de deuda interna y externa tanto de corto plazo como de\nlargo plazo garantizados con instrumentos de deuda, de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "38100",
                "denominacion" => "Títulos y Valores Internos de Corto Plazo",
                "descripcion" => "Recursos derivados de la emisión de títulos y valores como letras, bonos y otros realizados en el\nmercado interno, cuyo vencimiento es menor a doce meses y que imponen al emisor la obligación\nincondicional de pagar sumas preestablecidas en una fecha específica.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "38200",
                "denominacion" => "Títulos y Valores Internos de Largo Plazo",
                "descripcion" => "Recursos derivados de la emisión de títulos y valores como letras, bonos y otros realizados en el\nmercado interno, cuyo vencimiento es mayor a doce meses y que imponen al emisor la obligación\nincondicional de pagar sumas preestablecidas en una fecha específica.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "38300",
                "denominacion" => "Títulos y Valores Externos de Corto Plazo",
                "descripcion" => "Recursos derivados de la emisión de títulos y valores como letras, bonos y otros realizados en el\nmercado externo, cuyo vencimiento es menor a doce meses y que imponen al emisor la obligación\nincondicional de pagar sumas preestablecidas en una fecha específica.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "38400",
                "denominacion" => "Títulos y Valores Externos de Largo Plazo",
                "descripcion" => "Recursos derivados de la emisión de títulos y valores como letras, bonos y otros realizados en el\nmercado externo, cuyo vencimiento es mayor a doce meses y que imponen al emisor la obligación\nincondicional de pagar sumas preestablecidas en una fecha específica.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "39000",
                "denominacion" => "INCREMENTO DE OTROS PASIVOS Y APORTES DE CAPITAL",
                "descripcion" => "Fuentes financieras que se originan en los incrementos netos de saldos de la deuda a corto plazo y largo\nplazo documentada o no, los aumentos de pasivos diferidos y las variaciones positivas de los depósitos\nque constituyen las instituciones financieras. El incremento de estos pasivos debe ser calculado por las\ninstituciones públicas con excepción del Órgano Ejecutivo. Incluye los aportes de capital tanto del sector\npúblico como privado.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "39100",
                "denominacion" => "Incremento de Cuentas por Pagar a Corto Plazo",
                "descripcion" => "Fuentes financieras que se originan en los incrementos netos de saldos de cuentas por pagar a\ncorto plazo, documentada y no documentada que constituye una institución pública con\nproveedores, contratistas y otros. Su cálculo es el resultado de realizar mayores gastos\ndevengados que pagos en el ejercicio, de tal manera que la política financiera genere un\nincremento neto de los pasivos.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "39110",
                "denominacion" => "Incremento de Cuentas por Pagar a Corto Plazo por Deudas Comerciales",
                "descripcion" => "Fuentes financieras que se originan en los incrementos netos de saldos de cuentas por\npagar a corto plazo que constituye una institución pública por deudas comerciales con\nproveedores.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "39120",
                "denominacion" => "Incremento de Cuentas por Pagar a Corto Plazo con Contratistas",
                "descripcion" => "Fuentes financieras que se originan en los incrementos netos de saldos de cuentas por\npagar a corto plazo que constituye una institución pública con contratistas.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "39130",
                "denominacion" => "Incremento de Cuentas por Pagar a Corto Plazo por Sueldos y Jornales",
                "descripcion" => "Fuentes financieras que se originan en los incrementos netos de saldos de cuentas por\npagar a corto plazo por sueldos y jornales.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "39140",
                "denominacion" => "Incremento de Cuentas por Pagar a Corto Plazo por Aportes Patronales",
                "descripcion" => "Fuentes financieras que se originan en los incrementos netos de saldos de cuentas por\npagar a corto plazo por aportes patronales.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "39150",
                "denominacion" => "Incremento de Cuentas por Pagar a Corto Plazo por Retenciones",
                "descripcion" => "Fuentes financieras que se originan en los incrementos netos de saldos de cuentas por\npagar a corto plazo por retenciones.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "39160",
                "denominacion" => "Incremento de Cuentas por Pagar a Corto Plazo por Impuestos, Regalías y Tasas",
                "descripcion" => "Fuentes financieras que se originan en los incrementos netos de saldos de cuentas por\npagar a corto plazo por impuestos, regalías y tasas.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "39170",
                "denominacion" => "Incremento de Cuentas por Pagar a Corto Plazo por Jubilaciones y Pensiones",
                "descripcion" => "Fuentes financieras que se originan en los incrementos netos de saldos de cuentas por\npagar a corto plazo por jubilaciones y pensiones.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "39180",
                "denominacion" => "Incremento de Cuentas por Pagar a Corto Plazo por Intereses",
                "descripcion" => "Fuentes financieras que se originan en los incrementos netos de saldos de cuentas por\npagar a corto plazo por intereses de la deuda pública.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "39190",
                "denominacion" => "Incremento de Otros Pasivos y Otras Cuentas por Pagar a Corto Plazo",
                "descripcion" => "Fuentes financieras que se originan en los incrementos netos de saldos de otros pasivos y\notras cuentas por pagar a corto plazo. Incluye las variaciones netas de saldos de depósitos\na la vista, depósitos en caja de ahorro y a plazo fijo de las instituciones financieras y la\ndisminución neta de documentos y efectos comerciales por pagar, otros documentos por\npagar y pasivos diferidos a corto plazo.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "39200",
                "denominacion" => "Incremento de Cuentas por Pagar a Largo Plazo",
                "descripcion" => "Fuentes financieras que se originan en los incrementos netos de saldos de cuentas por pagar a\nlargo plazo, documentada y no documentada que tiene una institución pública con proveedores\ny contratistas.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "39210",
                "denominacion" => "Incremento de Cuentas por Pagar a Largo Plazo por Deudas Comerciales",
                "descripcion" => "Fuentes financieras que se originan en los incrementos netos de saldos de cuentas por\npagar a largo plazo que tiene una institución pública por deudas comerciales con\nproveedores.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "39220",
                "denominacion" => "Incremento de Otras Cuentas por Pagar a Largo Plazo",
                "descripcion" => "Fuentes financieras que se originan en los incrementos netos de saldos de otras cuentas\npor pagar a largo plazo. Incluye las variaciones netas de saldos de documentos y efectos\ncomerciales por pagar, otros documentos por pagar y pasivos diferidos a largo plazo.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "EDC",
                "codigo" => "530",
                "denominacion" => "Export Development Corporation (CANADA)",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "-",
                "codigo" => "39300",
                "denominacion" => "Aportes de Capital",
                "descripcion" => "Recursos provenientes de los incrementos de capital, sea en forma directa o indirecta, derivados\nde aportes realizados tanto por agentes económicos privados así como del sector público.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "39310",
                "denominacion" => "Del Sector Público",
                "descripcion" => "Recursos provenientes de aportes de capital de origen estatal.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "39320",
                "denominacion" => "Del Sector Privado",
                "descripcion" => "Recursos provenientes de aportes de capital de origen privado.",
                "fk_id_clasificador" => 2
            ],
            [
                "sigla" => "-",
                "codigo" => "10000",
                "denominacion" => "SERVICIOS PERSONALES",
                "descripcion" => "Gastos por concepto de servicios prestados por el personal permanente y no permanente, incluyendo el\ntotal de remuneraciones; así como los aportes al sistema de previsión social, otros aportes y previsiones\npara incrementos salariales.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11000",
                "denominacion" => "Empleados Permanentes",
                "descripcion" => "Remuneraciones al personal regular de cada entidad.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11100",
                "denominacion" => "Haberes Básicos",
                "descripcion" => "Remuneración básica percibida por el personal del Magisterio Fiscal, la cual debe estar\ndeterminada de acuerdo a la Escala Salarial aprobada. Se utilizará únicamente para\nprogramar el pago de haberes básicos y horas acumuladas del Magisterio Fiscal.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11200",
                "denominacion" => "Bono de Antigüedad",
                "descripcion" => "Remuneración determinada por la calificación de años de servicios prestados por el\nservidor público. Asimismo, incluye la asignación de recursos para el pago del Escalafón\nDocente.\nLas Empresas Públicas, utilizarán como base de cálculo, tres salarios mínimos nacionales\nconforme a la normativa vigente y el resto de las entidades deberán regirse de acuerdo a\nnormativa vigente.\nEl Magisterio Fiscal, Fuerzas Armadas y la Policía Boliviana, se regirán según su propio\nescalafón.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11210",
                "denominacion" => "Categorías Magisterio",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11220",
                "denominacion" => "Bono de Antigüedad",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11300",
                "denominacion" => "Bonificaciones",
                "descripcion" => "Remuneraciones complementarias al haber básico debiendo detallar en las planillas\npresupuestarias para fines de ejecución y control. Comprende bonificaciones, tales como:\nfrontera, categorías y escalafón del sector salud y bonificaciones para el Magisterio Fiscal,\nasí como otras aprobadas de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11310",
                "denominacion" => "Bono de Frontera",
                "descripcion" => "Se asignarán recursos del 20% del salario básico mensual como bono de frontera,\ndel cual se beneficiarán los (las) servidores (as) y trabajadores (as) del Sector\nPúblico, cuyo centro de trabajo se encuentre dentro de los 50 kilómetros lineales\nde las fronteras internacionales, de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11320",
                "denominacion" => "Remuneraciones Colaterales Médicas y de Trabajadores en Salud",
                "descripcion" => "El Ministerio de Salud, Instituciones de la Seguridad Social y los Servicios\nDepartamentales de Salud, podrán asignar recursos en esta partida para el pago\nde categorías médicas, escalafón médico y riesgo profesional, según las normas\nlegales establecidas. Esta previsión corresponde exclusivamente a los médicos\nque prestan servicios en salud que no sean de carácter administrativo y a los\ntrabajadores en salud dependientes de los Servicios Departamentales de Salud\n(SEDES).",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11321",
                "denominacion" => "Categorías Médicas",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11322",
                "denominacion" => "Escalafón Médico",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11323",
                "denominacion" => "Escalafón de los Trabajadores en Salud",
                "descripcion" => "Dependientes de los Servicios Departamentales de Salud, de acuerdo a\nnorma legal vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11324",
                "denominacion" => "Otras Remuneraciones",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11330",
                "denominacion" => "Otras Bonificaciones",
                "descripcion" => "Esta partida podrá ser utilizada únicamente cuando las entidades públicas\ncuenten con una Ley o Decreto Supremo específico, que autorice el pago del\nbeneficio, cuyo lineamiento se extiende a las Entidades Territoriales Autónomas y\nUniversidades Públicas, conforme a la normativa vigente y garantizando la\nsostenibilidad financiera.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11400",
                "denominacion" => "Aguinaldos",
                "descripcion" => "Remuneración extraordinaria anual conforme a las disposiciones legales en vigencia.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11500",
                "denominacion" => "Primas y Bono de Producción",
                "descripcion" => "Retribución anual en las instituciones públicas, cuyo pago está sujeto a las utilidades\nanuales netas obtenidas y excedentes financieros de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11510",
                "denominacion" => "Primas",
                "descripcion" => "Pago adicional anual derivado de la generación de utilidades netas obtenidas\nanualmente, de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11520",
                "denominacion" => "Bono de Producción",
                "descripcion" => "Pago adicional anual derivado de mayor productividad percápita, sobre la\nparticipación legal de excedentes financieros que no deben ser resultado de la\nvariación de precios, tasas, tarifas o mejoras tecnológicas, el cual estará calculado\nde acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11600",
                "denominacion" => "Asignaciones Familiares",
                "descripcion" => "Se asignarán recursos para el pago de subsidios de prenatal, natalidad, lactancia y sepelio,\nde acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11700",
                "denominacion" => "Sueldos",
                "descripcion" => "Esta partida será utilizada para asignar el sueldo o haber básico mensual de los servidores\npúblicos sobre la base de la escala salarial vigente, aprobada de acuerdo a normativa\nvigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11800",
                "denominacion" => "Dietas",
                "descripcion" => "Retribuciones a los miembros de Directorios, por asistencia a reuniones ordinarias o\nextraordinarias y en el caso de los Concejos Municipales, Asambleístas suplentes\n(Departamentales y Regionales) de acuerdo a normativa vigente. Por ser miembros de\nalgún Directorio, los Servidores Públicos que perciben sus honorarios con recursos\npúblicos, no pueden ser beneficiarios del pago de dietas.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11810",
                "denominacion" => "Dietas de Directorio",
                "descripcion" => "Retribución a los miembros de Directorio que no perciben sueldos y salarios del\nSector Público.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11820",
                "denominacion" => "Otras Dietas",
                "descripcion" => "Retribución a autoridades suplentes del Órgano deliberativo de las Entidades\nTerritoriales Autónomas (ETAs), por la asistencia a sesiones en reemplazo del\ntitular, y otros de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11900",
                "denominacion" => "Otros Servicios Personales",
                "descripcion" => "Gastos no clasificados en las anteriores partidas del grupo de servicios personales, incluye:\nsobre tiempo por horas extraordinarias trabajadas, asignaciones por vacaciones no utilizadas\nal personal retirado, incentivos económicos y otras asignaciones destinadas por\nejemplo a la diferencia de haberes por suplencia temporal en un cargo de mayor jerarquía,\ncuando corresponda de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11910",
                "denominacion" => "Horas Extraordinarias",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11920",
                "denominacion" => "Vacaciones no Utilizadas",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11930",
                "denominacion" => "Incentivos Económicos",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11940",
                "denominacion" => "Suplencias",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "12000",
                "denominacion" => "Empleados No Permanentes",
                "descripcion" => "Gastos para remunerar los servicios prestados a personas sujetas a contrato en forma transitoria\no eventual, para misiones específicas, programas y proyectos de inversión; considerando para el\nefecto, la equivalencia de funciones y la escala salarial, de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "12100",
                "denominacion" => "Personal Eventual",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "23100",
                "denominacion" => "Alquiler de Inmuebles",
                "descripcion" => "Gastos por uso de inmuebles destinados a oficinas, escuelas y otros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "13000",
                "denominacion" => "Previsión Social",
                "descripcion" => "Gastos por concepto de aportes patronales a las entidades que administran el Seguro Social\nObligatorio.\nLa base de cálculo para la cotización de aportes patronales (cuando corresponda), son las\nsiguientes:",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11100",
                "denominacion" => "Haberes Básicos.",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11200",
                "denominacion" => "Bono de Antigüedad.",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11300",
                "denominacion" => "Bonificaciones.",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11700",
                "denominacion" => "Sueldos",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "11900",
                "denominacion" => "Otros Servicios Personales",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "12100",
                "denominacion" => "Personal Eventual",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "13100",
                "denominacion" => "Aporte Patronal al Seguro Social",
                "descripcion" => "Gastos por concepto de aportes patronales en favor del Seguro Social Obligatorio,\nconsiderando lo siguiente: 10% Seguro de Corto Plazo, 1.71% riesgos profesionales, 3%\naporte patronal solidario y 2% aporte patronal solidario minero, cuando corresponda, de\nacuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "13110",
                "denominacion" => "Régimen de Corto Plazo (Salud)",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "13120",
                "denominacion" => "Prima de Riesgo Profesional Régimen de Largo Plazo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "13130",
                "denominacion" => "Aporte Patronal Fondo Solidario Régimen de Largo Plazo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "13131",
                "denominacion" => "Aporte Patronal Solidario 3%",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "13132",
                "denominacion" => "Aporte Patronal Minero Solidario 2%",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "13200",
                "denominacion" => "Aporte Patronal para Vivienda",
                "descripcion" => "Gastos por concepto de aportes patronales para la construcción de viviendas de interés\nsocial, 2% de la base cotizable, de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "14000",
                "denominacion" => "Otros",
                "descripcion" => "Gastos no clasificados anteriormente exentos de aportes de previsión social.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "14100",
                "denominacion" => "Otros",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "15000",
                "denominacion" => "Previsiones para Incremento de Gastos en Servicios Personales",
                "descripcion" => "Previsión para creación de ítems, aplicación de incrementos salariales y otros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "15100",
                "denominacion" => "Incremento Salarial",
                "descripcion" => "Previsión de recursos para incremento salarial.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "15200",
                "denominacion" => "Crecimiento Vegetativo",
                "descripcion" => "Previsión de recursos para creación de ítems, ascensos y recategorizaciones de personal\nen la Policía, Salud, Magisterio y Defensa.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "15300",
                "denominacion" => "Creación de Ítems",
                "descripcion" => "Previsión de recursos para creación de ítems para atender las necesidades institucionales.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "15400",
                "denominacion" => "Otras Previsiones",
                "descripcion" => "Previsión de recursos para entidades de nueva creación, para modificaciones en la\nestructura salarial, de cargos y otros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "20000",
                "denominacion" => "SERVICIOS NO PERSONALES",
                "descripcion" => "Gastos para atender los pagos por la prestación de servicios de carácter no personal, el uso de bienes\nmuebles e inmuebles de terceros, así como por su mantenimiento y reparación. Incluye asignaciones para\nel pago de servicios profesionales y comerciales prestados por personas naturales o jurídicas y por\ninstituciones públicas o privadas.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "21000",
                "denominacion" => "Servicios Básicos",
                "descripcion" => "Gastos por comunicaciones y servicios necesarios para el funcionamiento de las entidades,\nproporcionados o producidos por empresas del sector público o privado.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "21100",
                "denominacion" => "Comunicaciones",
                "descripcion" => "Gastos por servicios de correos, televisión por cable y otros, excepto servicios telefónicos,\nque poseen partida específica.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "21200",
                "denominacion" => "Energía Eléctrica",
                "descripcion" => "Gastos por consumo de energía eléctrica, independientemente de la fuente de suministro.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "21300",
                "denominacion" => "Agua",
                "descripcion" => "Gastos por consumo de agua, independientemente de la fuente de suministro.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "21400",
                "denominacion" => "Telefonía",
                "descripcion" => "Gastos destinados al pago de llamadas telefónicas locales, al interior y al exterior del país,\nasí como el pago tarifario mensual y el servicio de fax, incluye la telefonía móvil, de\nacuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "21500",
                "denominacion" => "Gas Domiciliario",
                "descripcion" => "Gastos destinados al pago del servicio de gas.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "21600",
                "denominacion" => "Internet",
                "descripcion" => "Gastos por servicios de internet, videoconferencias, transmisión de datos, dominio en\npáginas web y otros inherentes a este servicio, utilizados exclusivamente en entidades\npúblicas.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "22000",
                "denominacion" => "Servicios de Transporte y Seguros",
                "descripcion" => "Gastos por transporte de bienes al interior y exterior del país, transporte de personal, gastos de\npasajes y viáticos para personal permanente, eventual y consultores individuales de línea, de\nacuerdo a contrato establecido, cuando corresponda, facultados por autoridad competente, así\ncomo gastos de instalación y retorno de funcionarios destinados en el exterior del país, incluye\ngastos por contratación de seguros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "22100",
                "denominacion" => "Pasajes",
                "descripcion" => "Gastos por servicios de transporte: aéreo, terrestre y marítimo, por viaje de personal\npermanente, eventual y consultores individuales de línea, de acuerdo a contrato\nestablecido, cuando corresponda, al interior y exterior del país. Incluye gastos por cobro\nde servicio de Terminal Aeroportuaria y el Impuesto a las Salidas Aéreas al Exterior (ISAE).",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "22110",
                "denominacion" => "Pasajes al Interior del País",
                "descripcion" => "Gastos por pasajes dentro del territorio nacional, pasajes interdepartamentales y\nal interior del departamento; incluye gastos por cobro de servicio de terminal\naeroportuaria.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "22120",
                "denominacion" => "Pasajes al Exterior del País",
                "descripcion" => "Gastos por pasajes al exterior del país; incluye gastos por cobro de servicio de\nTerminal aeroportuaria y el Impuesto a las Salidas Aéreas al Exterior (ISAE).",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "22200",
                "denominacion" => "Viáticos",
                "descripcion" => "Gastos destinados a cubrir el alojamiento y manutención del personal que se encuentre\nen misión oficial, sea permanente, eventual y/o consultores individuales de línea, de\nacuerdo a contrato establecido, cuando corresponda.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "22210",
                "denominacion" => "Viáticos por Viajes al Interior del País.",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "22220",
                "denominacion" => "Viáticos por Viajes al Exterior del País.",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "22300",
                "denominacion" => "Fletes y Almacenamiento",
                "descripcion" => "Gastos por concepto de fletes: terrestres, aéreos y marítimos, por transporte y almacenamiento\nde bienes y equipos en general; incluye gastos por carga y descarga, y otros\nrelacionados.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "22400",
                "denominacion" => "Gastos de Instalación y Retorno",
                "descripcion" => "Gastos por concepto de instalación y retorno del personal diplomático, agentes aduaneros\ny otros funcionarios destinados en el exterior, de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "22500",
                "denominacion" => "Seguros",
                "descripcion" => "Gastos por contratación de seguros para personas, equipos, vehículos, muebles,\ninmuebles, instalaciones, producción, equipos satelitales y otros. Incluye el pago por\nfranquicias.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "22600",
                "denominacion" => "Transporte de Personal",
                "descripcion" => "Gastos destinados al traslado de personal en Comisión de las Instituciones Públicas,\nincluye el traslado de personal para realizar funciones operativas. Además de gastos por\nla entrega y recepción de documentación, efectuados por personal de servicios o\nmensajería.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "AFD",
                "codigo" => "738",
                "denominacion" => "Agencia Francesa de Desarrollo",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "-",
                "codigo" => "23200",
                "denominacion" => "Alquiler de Equipos y Maquinarias",
                "descripcion" => "Gastos por el uso de equipos y maquinarias, tales como: equipos electrónicos, equipos\nmédicos, de sonido, audiovisuales, maquinaria agrícola, de construcción, fijas o portables,\nvehículos, aeronaves, vagones, elevadores, mezcladoras y otros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "23300",
                "denominacion" => "Alquiler de Tierras y Terrenos",
                "descripcion" => "Gastos que se originan por la utilización de tierras y terrenos de propiedad de terceros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "23400",
                "denominacion" => "Otros Alquileres",
                "descripcion" => "Alquileres no especificados en las partidas anteriores, como derechos de aterrizajes,\nalquileres de semovientes, de garajes, tinglados, ambientes no destinados a oficinas y\notros. Incluye alquileres de muebles y enseres.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "24000",
                "denominacion" => "Instalación, Mantenimiento y Reparaciones",
                "descripcion" => "Asignaciones destinadas a la conservación de edificios, equipos, vías de comunicación y otros\nbienes de uso público, así como la conversión de vehículos a gas natural, ejecutados por terceros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "24100",
                "denominacion" => "Mantenimiento y Reparación de Inmuebles, muebles y Equipos",
                "descripcion" => "Gastos para atender el mantenimiento y reparación de inmuebles, incluyendo el pago de expensas comunes, muebles, enseres, equipos de oficina, médicos, sanitarios,\ncomunicación, tracción, transporte, elevación, perforación y otros que son ejecutados por\nterceros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "24110",
                "denominacion" => "Mantenimiento y Reparación de Inmuebles",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "24120",
                "denominacion" => "Mantenimiento y Reparación de Vehículos, Maquinaria y Equipos",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "24130",
                "denominacion" => "Mantenimiento y Reparación de Muebles y Enseres",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "24200",
                "denominacion" => "Mantenimiento y Reparación de Vías de Comunicación",
                "descripcion" => "Gastos destinados al mantenimiento y conservación de caminos, carreteras, autopistas,\npuentes, vías férreas y fluviales, aeródromos y otros ejecutados por terceros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "24300",
                "denominacion" => "Otros Gastos por Concepto de Instalación, Mantenimiento y Reparación",
                "descripcion" => "Gastos para la conservación de obras no clasificadas anteriormente, tales como:\nurbanísticas, hidráulicas, sanitarias, agropecuarias, tribunas para espectáculos, estantes\npara exposiciones. Incluye gastos por mantenimiento y reparación de componentes de\naeronaves, instalación de gas domiciliario, redes de datos y redes eléctricas internas,\nsoporte técnico, mantenimiento y actualización de software, instalaciones satelitales y\notras ejecutadas por terceros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "25000",
                "denominacion" => "Servicios Profesionales y Comerciales",
                "descripcion" => "Gastos por servicios profesionales de asesoramiento especializado, por estudios e investigaciones\nespecíficas de acuerdo a normativa vigente. Comprende pagos de comisiones y gastos bancarios,\nexcepto los relativos a la deuda pública. Se incluyen gastos por servicios sanitarios, médicos,\nsociales, de lavandería, publicidad e imprenta, ejecutados por terceros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "25100",
                "denominacion" => "Médicos, Sanitarios y Sociales",
                "descripcion" => "Gastos por contratación de terceros para servicios especializados como atención médica\ny análisis clínicos, servicios de laboratorios para investigación, pago de suscripciones a\ninstituciones de Normalización de Calidad, pago de Certificaciones de Calidad para\nLaboratorios y otros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "25120",
                "denominacion" => "Gastos Especializados por Atención Médica y otros",
                "descripcion" => "Comprende atención médica especializada, estudios, análisis, servicios de\nlaboratorio para investigación, exámenes preocupacionales y otros; incluye los\ngastos por las Prestaciones de Servicios de Salud Integral del Estado Plurinacional\nde Bolivia.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "25130",
                "denominacion" => "Gastos por Afiliación de Estudiantes Universitarios al Seguro Social",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "25200",
                "denominacion" => "Estudios, Investigaciones, Auditorías Externas y Revalorizaciones",
                "descripcion" => "Gastos por servicios de terceros contratados para la realización de estudios,\ninvestigaciones, auditorías externas y revalorizaciones de activos fijos y otras actividades\ntécnico profesionales, de acuerdo a la normativa vigente, que pueden formar parte de un\nproyecto de inversión, constituyendo gastos de funcionamiento o de operación.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "25210",
                "denominacion" => "Consultorías por Producto",
                "descripcion" => "Gastos destinados a la contratación de terceros bajo la modalidad de trabajo por\nproducto, cuya relación contractual está sujeta al régimen administrativo; que no forman parte de un proyecto de inversión, constituyendo gastos de\nfuncionamiento o de operación, de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "25220",
                "denominacion" => "Consultores Individuales de Línea",
                "descripcion" => "Gastos destinados a consultorías individuales de línea, para trabajos\nespecializados y de apoyo en las actividades propias de la entidad, de acuerdo a\nnormativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "25230",
                "denominacion" => "Auditorías Externas",
                "descripcion" => "Gastos destinados a la realización de auditorías externas, revalorización de activos\nfijos efectuados por terceros, de acuerdo a normativa vigente. Partida que puede\nser utilizada en actividades y proyectos de inversión capitalizables y no\ncapitalizables, cuando corresponda. Incluye las auditorias regulatorias.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "25300",
                "denominacion" => "Comisiones y Gastos Bancarios",
                "descripcion" => "Gastos por servicios que prestan las instituciones bancarias y de intermediación\nfinanciera. Se excluyen los relacionados con la Deuda Pública.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "25400",
                "denominacion" => "Lavandería, Limpieza e Higiene",
                "descripcion" => "Gastos por servicios de lavandería, limpieza, higiene y fumigación de bienes y lugares\npúblicos, realizados por terceros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "25500",
                "denominacion" => "Publicidad",
                "descripcion" => "Gastos por concepto de avisos, pautas publicitarias y difusión de información en:\nradiodifusoras, televisión, periódicos, internet (incluye redes sociales, páginas web, blogs,\naplicaciones y otros similares), contratos publicitarios y promociones por algún medio de\ndifusión, incluye material promocional, informativo, gigantografías, imagen institucional\ny/o comercial, y otros relacionados.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "25600",
                "denominacion" => "Servicios de Imprenta, Fotocopiado y Fotográficos",
                "descripcion" => "Gastos que se realizan por trabajos de: diseño, diagramación, impresión, compaginación,\nencuadernación, fotocopias y otros efectuados por terceros. Incluye los gastos por\nrevelado, y copiado de fotografías, slides y otros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "25700",
                "denominacion" => "Capacitación del Personal",
                "descripcion" => "Gastos por servicios destinados a la capacitación y adiestramiento de personal\npermanente, eventual y consultores individuales de línea, de acuerdo a contrato\nestablecido, cuando corresponda, en cursos de formación o instrucción, que son\nnecesarios para la actividad de la entidad. Comprende inscripciones, matrículas, cuotas,\nen cursos, seminarios y otros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "25800",
                "denominacion" => "Estudios e Investigaciones para Proyectos de Inversión No Capitalizables",
                "descripcion" => "Gastos por servicios de terceros contratados para la realización de estudios,\ninvestigaciones, asistencia técnica y otras actividades técnico profesionales, cumpliendo\nla normativa vigente, cuando formen parte de proyectos de inversión relacionados con\nfortalecimiento institucional, medio ambiente, educación, salud, asistencia social y otros\nque no se concretan en la generación de activos reales. Esta partida deberá\npresupuestarse solamente en proyectos no capitalizables.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "AICS",
                "codigo" => "739",
                "denominacion" => "Agencia Italiana para la Cooperación al Desarrollo",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "-",
                "codigo" => "25810",
                "denominacion" => "Consultorías por Producto",
                "descripcion" => "Gastos por servicios contratados a terceros para la realización de estudios,\ninvestigaciones, asistencia técnica y otras actividades técnico profesionales por\nproducto, de acuerdo a normativa vigente, cuando formen parte de proyectos de\ninversión cuya relación contractual está dentro del marco de los convenios de\nfinanciamiento.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "25820",
                "denominacion" => "Consultores Individuales de Línea",
                "descripcion" => "Gastos en consultores de programas y proyectos de inversión pública que\ndesempeñen actividades técnicas, operativas, administrativa, financiera cuya\nrelación contractual está dentro del marco de los convenios de financiamiento y\nde acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "25900",
                "denominacion" => "Servicios Manuales",
                "descripcion" => "Gastos ocasionales destinados al pago de servicios de terceros como: albañilería,\ncarpintería, herrería, cerrajería, plomería, jardinería, estibadores y otros servicios\nmanuales. Estos servicios no son recurrentes ni propios de la entidad.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "26000",
                "denominacion" => "Otros Servicios No Personales",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "26200",
                "denominacion" => "Gastos Judiciales",
                "descripcion" => "Gastos que se realizan como consecuencia de acciones judiciales, incluye servicios\nnotariales y otros relacionados.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "26300",
                "denominacion" => "Derechos sobre Bienes Intangibles",
                "descripcion" => "Gastos que se realizan por la utilización de bienes, tales como derechos de autor, licencias\ny uso de bienes y activos de propiedad industrial, comercial o intelectual. Incluye\ncertificaciones digitales.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "26500",
                "denominacion" => "Conjueces y Jueces Ciudadanos",
                "descripcion" => "Gastos destinados al pago de conjueces y jueces ciudadanos de acuerdo a normativa\nvigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "26600",
                "denominacion" => "Servicio de Seguridad de los Batallones de Seguridad Física de la Policía Boliviana, las\nFuerzas Armadas y Vigilancia Privada",
                "descripcion" => "Gastos destinados al pago de servicios de seguridad prestados por los Batallones de\nSeguridad Física dependientes de la Policía Boliviana y por las Fuerzas Armadas. Incluye\ngastos para el pago de Servicios de Vigilancia Privada, como también para el pago de\nServicios de Seguridad de transporte de valores.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "26610",
                "denominacion" => "Servicios Públicos",
                "descripcion" => "Gastos destinados al pago de servicios de seguridad prestados por los Batallones\nde Seguridad Física dependientes de la Policía Boliviana y por las Fuerzas Armadas\na los Altos Dignatarios de Estado, las MAEs y las entidades públicas, conforme a\nprocedimientos establecidos y de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "26620",
                "denominacion" => "Servicios Privados",
                "descripcion" => "Gastos destinados para la contratación de seguridad privada por aquellas\nentidades públicas, cuando la demanda exceda la capacidad de los servicios\nprestados por los Batallones de Seguridad Física de la Policía Boliviana.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "26630",
                "denominacion" => "Servicios por Traslado de Valores",
                "descripcion" => "Gastos destinados al pago de servicios de seguridad y vigilancia efectuado por\npersonas naturales o jurídicas por traslado y custodia de valores.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "26640",
                "denominacion" => "Compensación Económica",
                "descripcion" => "Compensación Económica para miembros de las Fuerzas Armadas y la Policía\nBoliviana que conforman en el Comando Estratégico Operacional de Lucha Contra\nel Contrabando y las Actividades Ilícitas y personal operativo del Servicio Aéreo de\nSeguridad Ciudadana, en función a procedimientos establecidos y normativa\nvigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "26700",
                "denominacion" => "Servicios de Laboratorios Especializados",
                "descripcion" => "Gastos a terceros por la prestación de servicios de laboratorio especializado para la\nindustria, incluye estudios, análisis, normalización de calidad y otros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "26900",
                "denominacion" => "Otros Servicios No Personales",
                "descripcion" => "Gastos por conceptos no clasificados en las partidas anteriores. Se desagrega en:",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "26910",
                "denominacion" => "Gastos de Representación",
                "descripcion" => "Se incluyen los gastos de representación autorizados expresamente por las\ndisposiciones legales vigentes.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "26920",
                "denominacion" => "Fallas de Caja",
                "descripcion" => "Gastos por fallas de caja en las instituciones financieras.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "26930",
                "denominacion" => "Pago por Trabajos Dirigidos y Pasantías",
                "descripcion" => "Pago de incentivo a estudiantes que cumplen funciones temporales por trabajos\ndirigidos y pasantías en instituciones públicas de acuerdo a convenios\ninterinstitucionales, así como por trabajos de investigación realizados por\nestudiantes de las universidades públicas y privadas.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "26940",
                "denominacion" => "Compensación Costo de Vida",
                "descripcion" => "Compensación por costo de vida para servidores públicos que cumplen funciones\npermanentes en el exterior del país.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "26950",
                "denominacion" => "Aguinaldo “Esfuerzo por Bolivia”",
                "descripcion" => "Gasto destinado al pago del Segundo Aguinaldo Esfuerzo por Bolivia, que se\nasignará cuando el crecimiento anual del Producto Interno Bruto – PIB, supere el\ncuatro punto cinco por ciento (4.5%).",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "26990",
                "denominacion" => "Otros",
                "descripcion" => "Gasto destinado al pago de servicios de terceros, incluye gastos por distribución\nde boletas de pago, gastos inherentes a procesos electorales y/o registros\npúblicos, gastos específicos de líneas aéreas (según normativa nacional e\ninternacional de aeronáutica civil), servicios de apoyo al deporte y otros que\ntengan duración definida en actividades propias de la entidad.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "27000",
                "denominacion" => "Gastos por Servicios Especializados por la Actividad Extractiva de Recursos Naturales del\nEstado Plurinacional",
                "descripcion" => "Gastos por actividades especializadas realizadas por terceros en operaciones extractivas, de transformación, de conversión y otros, de los recursos naturales de propiedad del Estado\nPlurinacional, de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "27100",
                "denominacion" => "Servicios por la Extracción, Transformación y Conversión de los Recursos Naturales de\nPropiedad del Estado Plurinacional.",
                "descripcion" => "Gastos por servicios de terceros contratados por instituciones y empresas públicas, para\nla realización de trabajos especializados en la actividad extractiva, transformación,\nconversión y otros, de los recursos naturales de propiedad del Estado Plurinacional.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "27110",
                "denominacion" => "Pago por Costos Incurridos",
                "descripcion" => "Pago o reposición a las empresas por los costos incurridos en los periodos de\nprueba, puesta en marcha, prestación de servicios, en operaciones de extracción,\ntransformación, conversión de los recursos naturales de propiedad del Estado\nPlurinacional conforme a procedimientos establecidos y de acuerdo a normativa\nvigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "27120",
                "denominacion" => "Pago por Utilidades",
                "descripcion" => "Pagos por distribución de utilidades por la prestación de servicios por operaciones\nde extracción, transformación y conversión de los recursos naturales de\npropiedad del Estado Plurinacional, de acuerdo a procedimientos establecidos y\nnormativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "30000",
                "denominacion" => "MATERIALES Y SUMINISTROS",
                "descripcion" => "Comprende la adquisición de artículos, materiales y bienes que se consumen o cambien de valor durante\nla gestión. Se incluye los materiales que se destinan a conservación y reparación de bienes de capital.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "41100",
                "denominacion" => "Edificios",
                "descripcion" => "Gastos destinados a la adquisición de edificios. El concepto “edificio\" incluye todas las\ninstalaciones unidas permanentemente y que forman parte del mismo, las cuales no\npueden instalarse o removerse sin romper las paredes, techos o pisos de la edificación.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "31000",
                "denominacion" => "Alimentos y Productos Agroforestales",
                "descripcion" => "Gastos destinados a la adquisición de bebidas y productos alimenticios, manufacturados o no,\nincluye animales vivos para consumo, aceites, grasas animales y vegetales, forrajes y otros\nalimentos para animales; además, comprende productos agrícolas, ganaderos, de silvicultura,\ncaza y pesca. Comprende madera y productos de este material.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "31100",
                "denominacion" => "Alimentos y Bebidas para Personas, Desayuno Escolar y Otros",
                "descripcion" => "Gastos destinados al pago de comida y bebida en establecimientos hospitalarios,\npenitenciarios, de orfandad, cuarteles, aeronaves y para el personal de seguridad según\nconvenio interinstitucional; incluye pago de refrigerio: al personal permanente, eventual\ny consultores individuales de línea de cada entidad, por procesos electorales, emergencias\ny/o desastres naturales; así como almuerzos o cenas de trabajo según disposición legal,\ndesayuno escolar y otros relacionados de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "31110",
                "denominacion" => "Gastos por Refrigerios al personal permanente, eventual y consultores\nindividuales de línea de las Instituciones Públicas.",
                "descripcion" => "Incluye pago por refrigerios al personal de seguridad de la Policía Boliviana, según\nconvenio interinstitucional.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "31120",
                "denominacion" => "Gastos por Alimentación y Otros Similares",
                "descripcion" => "Incluye los efectuados en reuniones, seminarios y otros eventos; así como los\ngastos por dotación de víveres a la Policía Boliviana y Fuerzas Armadas.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "31130",
                "denominacion" => "Alimentación Complementaria Escolar",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "31140",
                "denominacion" => "Alimentación Hospitalaria, Penitenciaria, Aeronaves y Otras Específicas",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "31150",
                "denominacion" => "Alimentos y Bebidas para la atención de emergencias y desastres naturales.",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "31200",
                "denominacion" => "Alimentos para Animales",
                "descripcion" => "Gastos destinados a la adquisición de forrajes y otros alimentos para animales de\npropiedad de instituciones públicas; alimentación de los animales de propiedad del\nEjército y de la Policía Boliviana, parques zoológicos, laboratorios de experimentación y\notros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "31300",
                "denominacion" => "Productos Agrícolas, Pecuarios y Forestales",
                "descripcion" => "Gastos para la adquisición de granos básicos, frutas y flores silvestres, goma, caña,\nsemillas y otros productos agroforestales y agropecuarios en bruto; además, gastos por\nconcepto de adquisición de maderas de construcción, puertas, ventanas, vigas, callapos,\ndurmientes manufacturados o no, y todo otro producto proveniente de esta rama,\nincluido carbón vegetal. Incluye gastos por la compra de ganado y otros animales vivos,\ndestinados al consumo, repoblamiento, mejoramiento genético o para usos industriales y\ncientíficos; incluye productos derivados de los mismos, como ser leche, huevos, lana, miel,\npieles y otros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "32000",
                "denominacion" => "Productos de Papel, Cartón e Impresos",
                "descripcion" => "Gastos destinados a la adquisición de papel y cartón en sus diversas formas y clases; libros y\nrevistas, textos de enseñanza, compra y suscripción de periódicos.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "32100",
                "denominacion" => "Papel",
                "descripcion" => "Gastos destinados a la adquisición de papel de escritorio y otros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "32200",
                "denominacion" => "Productos de Artes Gráficas",
                "descripcion" => "Gastos para la adquisición de productos de artes gráficas y otros relacionados. Incluye\ngastos destinados a la adquisición de artículos hechos de papel y cartón.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "32300",
                "denominacion" => "Libros, Manuales y Revistas",
                "descripcion" => "Gastos destinados a la adquisición de libros, manuales y revistas para bibliotecas y\noficinas.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "32400",
                "denominacion" => "Textos de Enseñanza",
                "descripcion" => "Gastos destinados a la compra de libros para uso docente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "32500",
                "denominacion" => "Periódicos y Boletines",
                "descripcion" => "Gastos para la compra y suscripción de periódicos y boletines, incluye gacetas oficiales.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "33000",
                "denominacion" => "Textiles y Vestuario",
                "descripcion" => "Gastos para la compra de ropa de trabajo, vestuario, uniformes, adquisición de calzados, hilados,\ntelas de lino, algodón, seda, lana, fibras artificiales y tapices, alfombras, sábanas, toallas, sacos de\nfibras y otros artículos conexos de cáñamo, yute y otros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "33100",
                "denominacion" => "Hilados, Telas, Fibras y Algodón",
                "descripcion" => "Gastos destinados para la compra de hilados y telas de lino, algodón, seda, lana y fibras\nartificiales, no utilizados aún en procesos de confección.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "33200",
                "denominacion" => "Confecciones Textiles",
                "descripcion" => "Gastos destinados a la adquisición de tapices, alfombras, sábanas, toallas, sacos de fibras,\ncolchones, carpas, cortinas y otros textiles similares.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "33300",
                "denominacion" => "Prendas de Vestir",
                "descripcion" => "Gastos destinados a la adquisición de uniformes, vestimenta de diversos tipos, ropa de\ntrabajo, distintivos y accesorios, independientemente del material de fabricación y otras\nde seguridad industrial de trabajo establecidas por disposiciones en vigencia.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "33400",
                "denominacion" => "Calzados",
                "descripcion" => "Gastos destinados a la compra de calzados o zapatos complementarios de uniformes y los\nde uso exclusivo de servidores públicos que, por razones de seguridad industrial de trabajo\nestablecidas por disposiciones en vigencia.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "34000",
                "denominacion" => "Combustibles, Productos Químicos, Farmacéuticos y Otras Fuentes de Energía",
                "descripcion" => "Gastos destinados a la compra de combustibles, lubricantes, energía eléctrica, productos químicos\ny farmacéuticos, llantas, neumáticos y otras.\nSe incluye gastos por compra de cueros en sus distintos tipos (excepto vestimenta) elaborados o\nsemi elaborados en forma de tientos, correas, suelas y demás formas empleadas en distintos\nusos, cauchos en sus distintas formas de producción (planchas, trozos o bajo forma de caños),\ntubos, caucho en bruto; gastos por compra de cemento, cal y productos elaborados con arcilla,\nvidrio, loza, porcelana, cemento, asbesto, yeso y plástico para fines de uso o consumo,\nproducción, mantenimiento o construcción de obras; gastos por la compra de productos\nsiderúrgicos férricos y no férricos, de estructuras metálicas acabadas, herramientas menores,\nmaterial y equipo militar y otros productos metálicos. Comprende adicionalmente recursos para\nla adquisición de minerales sólidos, minerales metálicos y no metálicos.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "34100",
                "denominacion" => "Combustibles, Lubricantes, Derivados y otras Fuentes de Energía",
                "descripcion" => "Gastos para la adquisición de petróleo crudo y parcialmente refinado, gasolina, kerosene,\nalcohol, aceites, grasas, fuel-oil, diesel, alquitrán, energía eléctrica y otros, como gas y\ncemento asfáltico. Se excluye la compra de leña y carbón. Se desagrega en:",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "34110",
                "denominacion" => "Combustibles, Lubricantes y Derivados para consumo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "34120",
                "denominacion" => "Combustibles, Lubricantes y Derivados para comercialización",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "34130",
                "denominacion" => "Energía Eléctrica para Comercialización",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "41200",
                "denominacion" => "Tierras y Terrenos",
                "descripcion" => "Gastos para la adquisición de tierras y terrenos, cualquiera sea su destino. Ejemplo:\nterrenos para edificaciones escolares, construcción de vías, edificios, expropiaciones y\notros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "41300",
                "denominacion" => "Otras Adquisiciones",
                "descripcion" => "Gastos destinados a la adquisición de inmuebles no contemplados en las partidas\nanteriores.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "CDP",
                "codigo" => "740",
                "denominacion" => "Cassa depositi e prestiti S.p.A.",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "-",
                "codigo" => "34200",
                "denominacion" => "Productos Químicos y Farmacéuticos",
                "descripcion" => "Gastos para la adquisición de compuestos químicos, tales como ácidos, sales, bases\nindustriales, salitres, calcáreos, pinturas, colorantes, pulimentos; abonos y fertilizantes\ndestinados a labores agrícolas; insecticidas, fumigantes y otros utilizados en labores\nagropecuarias; medicamentos e insumos para hospitales, clínicas, policlínicas y\ndispensarios, incluyendo productos básicos para botiquines y los utilizados en veterinaria.\nAdemás de los insumos requeridos en la construcción, remodelación y mantenimiento de\nactivos fijos y otros materiales químicos, anticongelantes.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "34300",
                "denominacion" => "Llantas y Neumáticos",
                "descripcion" => "Gastos destinados a la compra de aros, llantas y neumáticos para utilización en los equipos\nde tracción, transporte y elevación.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "34400",
                "denominacion" => "Productos de Cuero y Caucho",
                "descripcion" => "Gastos destinados a la compra de cueros, pieles, curtidos y sin curtir; maletines,\nportafolios y otros artículos confeccionados con cuero; además de artículos elaborados\ncon caucho, excepto prendas de vestir, llantas y cámaras de aire.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "34500",
                "denominacion" => "Productos de Minerales no Metálicos y Plásticos",
                "descripcion" => "Gastos por la adquisición de productos de arcilla como macetas, floreros, ceniceros,\nadornos y otros. Comprende además productos de vidrio como ceniceros, floreros,\nadornos y vidrio plano. Productos elaborados en loza y porcelana como ser: jarros, vajillas,\ninodoros, lavamanos y otros. Adquisición de cemento, cal y yeso para construcción,\nremodelación o mantenimiento de edificaciones públicas. Compra de tubos sanitarios,\nbloques, tejas y otros productos elaborados con cemento. Incluye la adquisición de\nproductos en cuya elaboración se utilizaron minerales no metálicos; además de tubos\nutilizados en instalaciones eléctricas y sanitarias, envases, mochilas para fumigación y\notros productos en cuya elaboración se utilizó material plástico. Se excluye aquellos\nconsiderados como material de escritorio.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "34600",
                "denominacion" => "Productos Metálicos",
                "descripcion" => "Gastos destinados a la adquisición de lingotes, planchas, planchones, hojalata, perfiles,\nalambres, varillas y otros, siempre que sean de hierro o acero. Incluye productos\nelaborados con base en aluminio, cobre, zinc, bronce y otras aleaciones; además de\nenvases y otros artículos de hojalata, ferretería, estructuras metálicas acabadas y demás\nproductos metálicos. Se excluye la compra de repuestos y/o accesorios de un activo.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "34700",
                "denominacion" => "Minerales",
                "descripcion" => "Gastos destinados a la adquisición de estaño, plomo, oro, plata, wólfram, zinc y otros\nminerales metálicos; carbón mineral en todas sus variedades; piedra, arcilla, arena y grava\npara la construcción en general, además de diversos metaloides.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "34800",
                "denominacion" => "Herramientas Menores",
                "descripcion" => "Gastos para la adquisición de herramientas y equipos menores para uso agropecuario,\nindustrial, de transporte, de construcción, tales como destornilladores, alicates, martillos,\ntenazas, serruchos, picos, palas, tarrajas y otras herramientas menores no activables.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "34900",
                "denominacion" => "Material y Equipo Militar",
                "descripcion" => "Gastos a ser efectuados por los Ministerios de Defensa y Gobierno para la adquisición de\nmaterial y equipo militar de tipo fungible. Así como por las Entidades Territoriales\nAutónomas para equipos de protección individual para la Policía Boliviana, de acuerdo a\nnormativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "39000",
                "denominacion" => "Productos Varios",
                "descripcion" => "Gastos en productos de limpieza, material deportivo, utensilios de cocina y comedor, instrumental\nmenor médico-quirúrgico, útiles de escritorio, de oficina y enseñanza, materiales eléctricos,\nrepuestos y accesorios en general.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "39100",
                "denominacion" => "Material de Limpieza e Higiene",
                "descripcion" => "Gastos destinados a la adquisición de materiales como jabones, detergentes,\ndesinfectantes, paños, ceras, cepillos, escobas y otros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "39200",
                "denominacion" => "Material Deportivo y Recreativo",
                "descripcion" => "Gastos destinados a la adquisición de material deportivo. Incluye las compras para\nproveer material deportivo a las delegaciones deportivas destacadas dentro y fuera del\npaís en representación oficial. Se incluye, además, el material destinado a usos\nrecreativos. Se exceptúan las adquisiciones para donaciones a servidores públicos del\nEstado Plurinacional o personas del sector privado, de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "39300",
                "denominacion" => "Utensilios de Cocina y Comedor",
                "descripcion" => "Gastos destinados a la adquisición de menaje de cocina y vajilla de comedor a ser utilizada\nen hospitales, hogares de niños, asilos y otras.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "39400",
                "denominacion" => "Instrumental Menor Médico-Quirúrgico",
                "descripcion" => "Gastos destinados a la compra de estetoscopios, termómetros, probetas, desfibriladores,\nademás de material y útiles menores médicos quirúrgicos utilizados en hospitales, clínicas,\nestablecimientos de salud, veterinarias, líneas aéreas y demás dependencias médicas del\nsector público.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "39500",
                "denominacion" => "Útiles de Escritorio y Oficina",
                "descripcion" => "Gastos destinados a la adquisición de útiles de escritorio como ser: tintas, lápices, bolígrafos,\nengrapadoras, perforadoras, calculadoras, medios magnéticos, tóner para\nimpresoras y fotocopiadoras y otros destinados al funcionamiento de oficinas.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "39600",
                "denominacion" => "Útiles Educacionales, Culturales y de Capacitación",
                "descripcion" => "Gastos destinados a la compra de útiles y materiales de apoyo educacional, cultural y de\ncapacitación.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "39700",
                "denominacion" => "Útiles y Materiales Eléctricos",
                "descripcion" => "Gastos para la adquisición de focos, cables eléctricos y de transmisión de datos, sockets,\ntubos fluorescentes, accesorios de radios, lámparas de escritorio, electrodos, planchas,\nlinternas, conductores, aisladores, fusibles, baterías, pilas, interruptores, conmutadores,\nenchufes y otros relacionados.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "39800",
                "denominacion" => "Otros Repuestos y Accesorios",
                "descripcion" => "Gastos destinados a la compra de repuestos y accesorios para los equipos comprendidos\nen el Subgrupo 43000. Se exceptúan las llantas y neumáticos y los clasificados en las\npartidas anteriores.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "39900",
                "denominacion" => "Otros Materiales y Suministros",
                "descripcion" => "Gastos por acuñación de monedas e impresión de billetes, vituallas por atención de\nemergencias, desastres naturales y todos aquellos materiales y suministros que no se\nclasificaron en las partidas anteriores.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "39910",
                "denominacion" => "Acuñación de Monedas e Impresión de Billetes",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "39911",
                "denominacion" => "Acuñación de monedas",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "39912",
                "denominacion" => "Impresión de billetes",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "39990",
                "denominacion" => "Otros Materiales y Suministros",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "40000",
                "denominacion" => "ACTIVOS REALES",
                "descripcion" => "Gastos para la adquisición de bienes duraderos, construcción de obras por terceros, compra de\nmaquinaria y equipo y semovientes. Se incluyen los estudios, investigaciones y proyectos realizados por\nterceros y la contratación de servicios de supervisión de construcciones y mejoras de bienes públicos de\ndominio privado y público, cuando corresponda incluirlos como parte del activo institucional. Comprende\nasimismo los activos intangibles.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "41000",
                "denominacion" => "Inmobiliarios",
                "descripcion" => "Gastos para la adquisición de bienes inmuebles. Comprende la compra de inmuebles, terrenos y\notros tipos de activos fijos afines.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "42000",
                "denominacion" => "Construcciones",
                "descripcion" => "Gastos para financiar construcciones nuevas, complementarias y mejoras que signifiquen\nincremento de valor y de vida útil, comprendiendo: unidades sanitarias, hospitales, edificios para\noficinas, viviendas, penitenciarías, construcciones del sector defensa y seguridad, edificaciones\npara escuelas y colegios, restaurantes, almacenes, galpones. Comprende los costos por obras que\npueden ser de tierra, pavimento o asfalto; trabajos de plataformas, cortes, obras de arte,\nalcantarillados, pasos, puentes y túneles, colocación de balasto; construcción de obras\naeroportuarias, incluyendo el edificio terminal, pistas de aterrizaje, calles de carreteo y el cerco\ncon malla olímpica; construcciones de puertos fluviales; obras urbanísticas como ser: apertura de\ncalles, avenidas urbanas, muros de contención, plazas, parques, paseos, jardines, monumentos,\ncampos deportivos, teatros al aire libre, zoológicos, y otras efectuadas en embalses, diques para\nalmacenamiento de agua con fines de riego, energía hidroeléctrica, obras para riegos, y otras\ndestinadas a la producción industrial, petrolera y/o minera.\nComprende asimismo, los proyectos cuya ejecución están bajo la modalidad de llave en mano, la\nsupervisión contratada de terceros para las construcciones y mejoras de bienes de dominio\nprivado y público. Las partidas de este subgrupo de gasto, pueden ser presupuestadas en\nproyectos capitalizables y excepcionalmente en proyectos no capitalizables.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "42200",
                "denominacion" => "Construcciones y Mejoras de Bienes Públicos Nacionales de Dominio Privado",
                "descripcion" => "Comprende las construcciones y mejoras que se incorporan al patrimonio institucional de\nlas entidades públicas. Se incluye la contratación de terceros para la supervisión de obras,\ncuando su costo pueda ser determinado en forma separada de la construcción y mejora\nde bienes públicos de dominio privado.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "42210",
                "denominacion" => "Construcciones y Mejoras de Viviendas",
                "descripcion" => "Gastos para la construcción y mejoramiento de viviendas y obras\ncomplementarias que incrementen el valor de las mismas, tales como rejas,\nprotecciones, garajes, jardines y otros. Incluye el costo de construcción y\nmejoramiento de viviendas para uso de personal militar o policial.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "42220",
                "denominacion" => "Construcciones y Mejoras para Defensa y Seguridad",
                "descripcion" => "Gastos en infraestructura para la prestación del servicio de defensa y policía.\nComprende la construcción y mejoramiento de edificios militares y policiales,\ncuarteles, aeropuertos, puertos y otras instalaciones militares.\nNo incluye la construcción de viviendas, aun cuando las mismas se destinen a uso\ndel personal militar o policial, la misma deberá ser imputada en la partida 42210\n“Construcciones y Mejoras de Viviendas”",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "42230",
                "denominacion" => "Otras Construcciones y Mejoras de Bienes Públicos de Dominio Privado",
                "descripcion" => "Gastos realizados en la construcción y mejoramiento de obras públicas del\ndominio privado tales como: edificios para oficinas públicas, escuelas, hospitales,\nelectrificación, hidroeléctrica, agua potable, alcantarillado sanitario,\ninfraestructura y equipamiento de industrialización de hidrocarburos, gas y\nminería, redes de distribución de gas, estadios y coliseos deportivos, y otras\nedificaciones destinadas al desarrollo de actividades comerciales, industriales y de\nservicios.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "42240",
                "denominacion" => "Supervisión de Construcciones y Mejoras de Bienes Públicos de Dominio Privado",
                "descripcion" => "Gastos realizados en la contratación de terceros para la supervisión de\nconstrucciones y mejoras de bienes públicos de dominio privado. Estos gastos se\nrealizan durante la ejecución física de las obras y serán aplicados integralmente al\ncosto total del activo institucional. Incluye los gastos por contratación a terceros\npara el Control y Monitoreo en proyectos contratados bajo la modalidad llave en\nmano.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "42300",
                "denominacion" => "Construcciones y Mejoras de Bienes Nacionales de Dominio Público",
                "descripcion" => "Comprende las construcciones y mejoras en infraestructura física que no pueden ser\nenajenadas por tratarse de bienes de dominio público. Se incluye la contratación de\nterceros para la supervisión de obras cuando su costo pueda ser determinado en forma\nseparada de la construcción y mejora de bienes de dominio público.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "42310",
                "denominacion" => "Construcciones y Mejoras de Bienes de Dominio Público",
                "descripcion" => "Gastos destinados a la construcción de obras del dominio público tales como:\ncalles, caminos, carreteras, túneles, parques, plazas, monumentos, canales,\npuentes, sistemas de riego y micro riego, y cualquier otra obra pública construida\npara utilidad común.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "42320",
                "denominacion" => "Supervisión de Construcciones y Mejoras de Bienes de Dominio Público",
                "descripcion" => "Gastos realizados en la contratación de terceros para la supervisión de\nconstrucciones y mejoras de bienes de dominio público. Estos gastos se realizan\ndurante la ejecución física de las obras y serán aplicados integralmente al costo total. Incluye los gastos por contratación a terceros para el Control y Monitoreo\nen proyectos contratados bajo la modalidad llave en mano.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "42400",
                "denominacion" => "Construcciones y Mejoras de Bienes Públicos Nacionales de Dominio Privado - Llave en\nMano",
                "descripcion" => "Comprende las construcciones y mejoras de Bienes Públicos de Dominio Privado, que se\nincorporan al patrimonio institucional de las Entidades públicas ejecutadas bajo la\nmodalidad LLave en Mano que incluye: estudios, infraestructura, supervisión,\nequipamiento, capacitación, transferencia de tecnología, puesta en marcha,\nmantenimiento por el periodo de garantías y otros, establecidos en el contrato de\nejecución.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "42500",
                "denominacion" => "Construcciones y Mejoras de Bienes Públicos Nacionales de Dominio Público - Llave en\nMano",
                "descripcion" => "Comprende las construcciones y mejoras de Bienes Públicos de Dominio Público,\nejecutadas bajo la modalidad LLave en Mano que incluye: estudios, infraestructura,\nsupervisión, equipamiento, capacitación, transferencia de tecnología, puesta en marcha,\nmantenimiento por el periodo de garantías y otros, establecidos en el contrato de\nejecución.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "43000",
                "denominacion" => "Maquinaria y Equipo",
                "descripcion" => "Gastos para la adquisición de maquinarias, equipos y aditamentos que se usan o complementan\na la unidad principal, comprendiendo: maquinaria y equipo de oficina, de producción, equipos\nagropecuarios, industriales, de transporte en general, energía, riego, frigoríficos, de\ncomunicaciones, médicos, odontológicos, educativos y otros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "43100",
                "denominacion" => "Equipo de Oficina y Muebles",
                "descripcion" => "Gastos para la adquisición de muebles, equipos de computación, fotocopiadoras, máquinas\nde escribir, relojes para control, equipos biométricos, mesas para dibujo y otros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "43110",
                "denominacion" => "Equipo de Oficina y Muebles",
                "descripcion" => "Gastos para la adquisición de muebles y enseres para el equipamiento de los\nambientes de las instituciones públicas.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "43120",
                "denominacion" => "Equipo de Computación",
                "descripcion" => "Gastos para la adquisición de equipos de computación y otros relacionados.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "43200",
                "denominacion" => "Maquinaria y Equipo de Producción",
                "descripcion" => "Gastos para la adquisición de maquinaria y equipo de producción, que comprende:\nequipos agropecuarios e industriales destinados a la producción de bienes, permitiendo\nla transformación de materias primas en productos acabados o semielaborados y otros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "61900",
                "denominacion" => "Intereses por Mora y Multas de la Deuda Pública Interna a Largo Plazo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "DKB",
                "codigo" => "741",
                "denominacion" => "Danske Bank",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "-",
                "codigo" => "43300",
                "denominacion" => "Equipo de Transporte, Tracción y Elevación",
                "descripcion" => "Gastos para la adquisición de equipos mecánicos, comprendiendo: equipos de transporte\npor vía terrestre, equipos ferroviarios, equipos para transporte por vía marítima, lacustre\ny fluvial, equipos para transporte por vía aérea. Comprende además, equipos de tracción,\ntales como: tractores, auto guías, montacargas, motoniveladoras, además de\nmotocicletas, bicicletas, tráiler y carretas. Asimismo, se incluye elevadores, ascensores,\nescaleras mecánicas, transformación de vehículos automotores a gas natural vehicular y\notros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "43310",
                "denominacion" => "Vehículos Livianos para Funciones Administrativas",
                "descripcion" => "Asignaciones destinadas a la adquisición de vehículos livianos para uso\nadministrativo y funciones operativas de las instituciones públicas, incluye:\nmotocicletas, bicicletas, cuadratracks y otros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "43320",
                "denominacion" => "Vehículos Livianos para Proyectos de Inversión Pública",
                "descripcion" => "Asignaciones destinadas a la adquisición de vehículos livianos para uso en la\nejecución de proyectos de inversión pública, incluye: motocicletas, bicicletas,\ncuadratracks y otros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "43330",
                "denominacion" => "Maquinaria y Equipo de Transporte",
                "descripcion" => "Asignaciones para la adquisición de equipos mecánicos, comprendiendo: equipos\nde transporte por vía terrestre, equipos ferroviarios, equipos para transporte por\nvía marítima, lacustre, fluvial, aérea y otros. Comprende además, equipos de\ntracción, tales como: tractores, autoguías, motoniveladoras y retroexcavadoras.\nAdemás de trailers, carretas, cisternas, volquetas, ambulancias, carro para\nbomberos, plantas asfálticas, grúas para remolcar vehículos, montacargas,\nremolques de plataforma y equipos de auxiliares de transporte para maniobras\nde puertos, aeropuertos, almacenes, patios de recepción, despacho de productos\ny otros no comprendidos en las partidas 43310 y 43320.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "43340",
                "denominacion" => "Equipo de Elevación",
                "descripcion" => "Comprende las asignaciones destinadas a la adquisición de elevadores, ascensores,\nescaleras mecánicas, y otros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "43400",
                "denominacion" => "Equipo Médico y de Laboratorio",
                "descripcion" => "Gastos para la adquisición de equipos médicos, odontológicos, sanitarios y de\ninvestigación, tales como: mesas de operación, bombas de cobalto, aparatos de rayos X,\nequipos de rayos laser, resonancia magnética, tomógrafos, hemodiálisis, instrumental\nmayor médico-quirúrgico, compresoras, sillones, aparatos de prótesis, microscopios,\ncentrifugadoras, refrigeradores especiales, laboratorios bioquímicos, esterilizadores,\namplímetros, teodolitos, cubicadores, balanzas de precisión, detectores de minerales,\ntelescopios y otros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "43500",
                "denominacion" => "Equipo de Comunicación",
                "descripcion" => "Gastos destinados a la adquisición de equipos para la transmisión y recepción de datos,\ncomo ser: plantas transmisoras, receptores de radios, equipo de televisión, vídeo y audio,\naparatos telegráficos, teletipos y aparatos de radio; incluye instalaciones como: torres de\ntransmisión, equipos utilizados en aeronavegación y actividades marítimas y lacustres,\nequipos de posicionamiento y medición (GPS), centrales telefónicas, aparatos telefónicos,\nequipos de telefonía IP, antenas de comunicación Wi-Fi, Access Point, redes de área\namplia, equipos de vigilancia y otros relacionados.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "43600",
                "denominacion" => "Equipo Educacional y Recreativo",
                "descripcion" => "Gastos en bienes duraderos destinados a la enseñanza y a la recreación, comprenden\naparatos audiovisuales, tales como: proyectores, micrófonos y otros. Además incluye\nequipos recreativos: carruseles, aparatos para parques infantiles y equipo menor de\ngimnasia, muebles especializados para uso escolar, tales como: pupitres, pizarrones y globos terráqueos. Se excluye mobiliario como sillas, mesas y anaqueles, aun estando\ndestinadas para uso docente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "43700",
                "denominacion" => "Otra Maquinaria y Equipo",
                "descripcion" => "Gastos para la adquisición de maquinaria y equipo especializados no contemplados en las\npartidas anteriores, incluye ventiladores y/o extractores de aire, calentadores de ambiente,\nenceradoras, refrigeradores, cocinas, aspiradoras, cámaras fotográficas digitales,\ncámaras de video digital, equipos para maniobra en aeropuertos y otros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "46000",
                "denominacion" => "Estudios y Proyectos para Inversión",
                "descripcion" => "Gastos para la contratación de estudios y otros realizados por terceros, tales como: la formulación\nde proyectos, realización de investigaciones y otras actividades técnico - profesionales, cuando\ncorresponda incluir el resultado de estas investigaciones y actividades al activo institucional. Las\npartidas de este subgrupo de gasto, deberán ser presupuestadas en proyectos capitalizables.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "46100",
                "denominacion" => "Para Construcciones de Bienes Públicos de Dominio Privado",
                "descripcion" => "Gastos por servicio de terceros contratados para la realización de investigaciones y otras\nactividades técnico - profesionales, necesarias para la construcción y mejoramiento de\nbienes Públicos de dominio privado.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "46110",
                "denominacion" => "Consultoría por Producto para Construcciones de Bienes Públicos de Dominio\nPrivado",
                "descripcion" => "Gastos por servicios de terceros contratados por producto para la realización de\nestudios para proyectos de construcción, de equipamiento y de mejoramiento de\nbienes públicos de dominio privado.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "46120",
                "denominacion" => "Consultoría de Línea para Construcciones de Bienes Públicos de Dominio\nPrivado",
                "descripcion" => "Gastos por servicios de consultores en proyectos de inversión pública necesarias\npara la construcción y mejoramiento de bienes públicos de dominio privado que\ndesempeñen actividades técnico - operativas, cuya relación contractual está\ndentro del marco de los convenios de financiamiento.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "46200",
                "denominacion" => "Para Construcciones de Bienes de Dominio Público",
                "descripcion" => "Gastos por servicio de terceros contratados para la realización de investigaciones y otras\nactividades técnico - profesionales, necesarias para la construcción y mejoramiento de\nbienes de dominio público.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "46210",
                "denominacion" => "Consultoría por Producto para Construcciones de Bienes Públicos de Dominio\nPúblico",
                "descripcion" => "Gastos por servicios de terceros contratados por producto para la realización de\nestudios para proyectos de construcción, de equipamiento y de mejoramiento de\nbienes de dominio público.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "46220",
                "denominacion" => "Consultoría de Línea para Construcciones de Bienes Públicos de Dominio\nPúblico",
                "descripcion" => "Gastos por servicios de consultores en proyectos de inversión pública necesarias\npara la construcción y mejoramiento de bienes de dominio público que\ndesempeñen actividades técnico - operativas, financieras y administrativas, cuya relación contractual está dentro del marco de los convenios de financiamiento.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "46300",
                "denominacion" => "Consultoría para capacitación, transferencia de tecnología y organización para procesos\nproductivos, en proyectos de Inversión específicos.",
                "descripcion" => "Gastos por servicios de terceros contratados para la realización de eventos de\ncapacitación, transferencia de tecnología y organización para procesos productivos, cuya\nrelación contractual está dentro del marco de los convenios de financiamiento.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "46310",
                "denominacion" => "Consultoría por Producto",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "46320",
                "denominacion" => "Consultoría de Línea",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "72420",
                "denominacion" => "Otras",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "CANADA",
                "codigo" => "545",
                "denominacion" => "Canadá",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "-",
                "codigo" => "49000",
                "denominacion" => "Otros Activos",
                "descripcion" => "Gastos destinados a la adquisición de otros activos no especificados en las partidas anteriores.\nIncluye los gastos en la compra de activos intangibles, gastos en bienes muebles existentes usados\ny la adquisición de semovientes y otros animales.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "49100",
                "denominacion" => "Activos Intangibles",
                "descripcion" => "Gastos destinados a la adquisición de derechos y licencias para el uso de bienes, activos\nde la propiedad industrial, comercial, intelectual y otros. Asimismo, incluye la adquisición\ny actualización de versiones de programas de computación.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "49300",
                "denominacion" => "Semovientes y Otros Animales",
                "descripcion" => "Gastos destinados a la adquisición de ganado de diferentes especies y todo tipo de\nanimales adquiridos con fines ornamentales, de reproducción o de trabajo.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "49400",
                "denominacion" => "Activos Museológicos y Culturales",
                "descripcion" => "Gastos destinados a la adquisición y/o restauración de activos museológicos y culturales,\nque no son depreciables.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "49900",
                "denominacion" => "Otros",
                "descripcion" => "Gastos destinados a la adquisición de otros activos no descritos anteriormente. Incluye\nobjetos valiosos y bibliotecas, no depreciables.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "50000",
                "denominacion" => "ACTIVOS FINANCIEROS",
                "descripcion" => "Compra de acciones, participaciones de capital, inversiones, concesión de préstamos de acuerdo a\nnormativa vigente y adquisición de títulos y valores. Incluye el incremento de saldos del activo disponible\ny exigible, además de los recursos inherentes a fideicomisos.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "51000",
                "denominacion" => "Compra de Acciones, Participaciones de Capital e Inversiones",
                "descripcion" => "Aportes de capital directo que generan participación patrimonial o mediante la adquisición de\nacciones u otros valores representativos del capital de empresas públicas, privadas e\ninternacionales, radicadas en el país o en el exterior, incluye inversiones en instrumentos\nfinancieros en el exterior.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "51100",
                "denominacion" => "Acciones y Participaciones de Capital en Empresas Privadas Nacionales",
                "descripcion" => "Gastos destinados a la adquisición de acciones y participaciones de capital en empresas\nprivadas nacionales, incluye acciones y certificados de aportación en cooperativas\ntelefónicas.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "51200",
                "denominacion" => "Acciones y Participaciones de Capital en Empresas Públicas Nacionales",
                "descripcion" => "Gastos destinados a la adquisición de acciones y participaciones de capital en empresas\npúblicas nacionales.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "51300",
                "denominacion" => "Acciones y Participaciones de Capital en Empresas Públicas Territoriales",
                "descripcion" => "Gastos destinados a la adquisición de acciones y participaciones de capital en empresas\nterritoriales.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "51310",
                "denominacion" => "Del Gobierno Autónomo Departamental",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "51320",
                "denominacion" => "Del Gobierno Autónomo Municipal",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "51330",
                "denominacion" => "Del Gobierno Autónomo Indígena Originario Campesino",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "51340",
                "denominacion" => "Del Gobierno Autónomo Regional",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "51500",
                "denominacion" => "Acciones y Participaciones de Capital en Instituciones Públicas Financieras No Bancarias",
                "descripcion" => "Gastos destinados a la adquisición de acciones y participaciones de capital en Instituciones\nPúblicas Financieras no Bancarias.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "51600",
                "denominacion" => "Acciones y Participaciones de Capital en Instituciones Públicas Financieras Bancarias",
                "descripcion" => "Gastos destinados a la adquisición de acciones y participaciones de capital en Instituciones\nFinancieras Bancarias.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "51700",
                "denominacion" => "Acciones y Participaciones de Capital en Organismos Internacionales",
                "descripcion" => "Gastos destinados a la adquisición de acciones y participaciones de capital en Organismos\nInternacionales.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "51800",
                "denominacion" => "Otras Acciones y Participaciones de Capital en el Exterior",
                "descripcion" => "Gastos destinados a la adquisición de otras acciones y participaciones de capital realizadas\nen el exterior.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "51900",
                "denominacion" => "Inversiones en el Exterior",
                "descripcion" => "Recursos destinados para realizar inversiones en instrumentos financieros en el exterior,\nde acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "52000",
                "denominacion" => "Concesión de Préstamos a Corto Plazo al Sector Público No Financiero",
                "descripcion" => "Préstamos directos a corto plazo concedidos al Sector Público No Financiero.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "52100",
                "denominacion" => "Concesión de Préstamos a Corto Plazo a los Órganos del Estado Plurinacional",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "52200",
                "denominacion" => "Concesión de Préstamos a Corto Plazo a Instituciones Públicas Descentralizadas",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "52400",
                "denominacion" => "Concesión de Préstamos a Corto Plazo a Entidades Territoriales Autónomas",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "52410",
                "denominacion" => "Gobierno Autónomo Departamental",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "52420",
                "denominacion" => "Gobierno Autónomo Municipal",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "52430",
                "denominacion" => "Gobierno Autónomo Indígena Originario Campesino",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "52440",
                "denominacion" => "Gobierno Autónomo Regional",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "52600",
                "denominacion" => "Concesión de Préstamos a Corto Plazo a Instituciones de Seguridad Social",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "52700",
                "denominacion" => "Concesión de Préstamos a Corto Plazo a Empresas Públicas Nacionales",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "52800",
                "denominacion" => "Concesión de Préstamos a Corto Plazo a Empresas Públicas Territoriales",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "52810",
                "denominacion" => "Del Gobierno Autónomo Departamental",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "52820",
                "denominacion" => "Del Gobierno Autónomo Municipal",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "52830",
                "denominacion" => "Del Gobierno Autónomo Indígena Originario Campesino",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "52840",
                "denominacion" => "Del Gobierno Autónomo Regional",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "53000",
                "denominacion" => "Concesión de Préstamos a Largo Plazo al Sector Público No Financiero",
                "descripcion" => "Préstamos directos a largo plazo concedidos al Sector Público No Financiero.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "53100",
                "denominacion" => "Concesión de Préstamos a Largo Plazo a los Órganos del Estado Plurinacional",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "53200",
                "denominacion" => "Concesión de Préstamos a Largo Plazo a Instituciones Públicas Descentralizadas",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "53400",
                "denominacion" => "Concesión de Préstamos a Largo Plazo a Entidades Territoriales Autónomas",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "53410",
                "denominacion" => "Gobierno Autónomo Departamental",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "53420",
                "denominacion" => "Gobierno Autónomo Municipal",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "53430",
                "denominacion" => "Gobierno Autónomo Indígena Originario Campesino",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "53440",
                "denominacion" => "Gobierno Autónomo Regional",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "53600",
                "denominacion" => "Concesión de Préstamos a Largo Plazo a Instituciones de Seguridad Social",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "53700",
                "denominacion" => "Concesión de Préstamos a Largo Plazo a Empresas Públicas Nacionales",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "53800",
                "denominacion" => "Concesión de Préstamos a Largo Plazo a Empresas Públicas Territoriales",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "53810",
                "denominacion" => "Del Gobierno Autónomo Departamental",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "53820",
                "denominacion" => "Del Gobierno Autónomo Municipal",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "53830",
                "denominacion" => "Del Gobierno Autónomo Indígena Originario Campesino",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "53840",
                "denominacion" => "Del Gobierno Autónomo Regional",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "54000",
                "denominacion" => "Concesión de Préstamos al Sector Público Financiero y a los Sectores Privado y del Exterior",
                "descripcion" => "Préstamos directos que se conceden al Sector Público Financiero y a los sectores privado y\nexterno.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "54100",
                "denominacion" => "Concesión de Préstamos a Corto Plazo a Instituciones Públicas Financieras No Bancarias",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "54200",
                "denominacion" => "Concesión de Préstamos a Corto Plazo a Instituciones Públicas Financieras Bancarias",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "54300",
                "denominacion" => "Concesión de Préstamos a Corto Plazo al Sector Privado",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "54400",
                "denominacion" => "Concesión de Préstamos a Corto Plazo al Exterior",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "54600",
                "denominacion" => "Concesión de Préstamos a Largo Plazo a Instituciones Públicas Financieras No Bancarias",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "54700",
                "denominacion" => "Concesión de Préstamos a Largo Plazo a Instituciones Públicas Financieras Bancarias",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "54800",
                "denominacion" => "Concesión de Préstamos a Largo Plazo al Sector Privado",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "54900",
                "denominacion" => "Concesión de Préstamos a Largo Plazo al Exterior",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "55000",
                "denominacion" => "Compra de Títulos y Valores",
                "descripcion" => "Compra de títulos y valores que representan inversión financiera para las instituciones que\nrealizan la adquisición y pasivos para el ente emisor y, por tanto, no representan participación o\npropiedad sobre su patrimonio.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "55100",
                "denominacion" => "Títulos y Valores a Corto Plazo",
                "descripcion" => "Adquisición de títulos y valores a corto plazo.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "55110",
                "denominacion" => "Letras del Tesoro",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "55120",
                "denominacion" => "Bonos del Tesoro",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "55130",
                "denominacion" => "Otros",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "55200",
                "denominacion" => "Títulos y Valores a Largo Plazo",
                "descripcion" => "Adquisición de títulos y valores a largo plazo.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "56000",
                "denominacion" => "Constitución de Fideicomisos y Servicios Financieros",
                "descripcion" => "Comprende los recursos otorgados para la constitución de fideicomisos y aquellos administrados\npara el cumplimiento de la finalidad de los mismos y para que las instituciones públicas legalmente\nfacultadas, suscriban contratos de administración y prestación de servicios financieros con\nentidades de intermediación financiera.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "56100",
                "denominacion" => "Colocación de Fondos en Fideicomiso",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "56200",
                "denominacion" => "Concesiones de Recursos de Fideicomisos",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "56300",
                "denominacion" => "Colocación de Fondos por Servicios Financieros",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "57000",
                "denominacion" => "Incremento de Disponibilidades",
                "descripcion" => "Aplicaciones financieras que se originan en el incremento neto de los saldos de caja y bancos e\ninversiones temporales.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "57100",
                "denominacion" => "Incremento de Caja y Bancos",
                "descripcion" => "Aplicaciones financieras que se originan en el incremento neto de saldos de caja y bancos.\nResulta de comparar los saldos iniciales y finales de caja y bancos que están determinados\npor las magnitudes de recibos y pagos de las instituciones públicas.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "57200",
                "denominacion" => "Incremento de Inversiones Temporales",
                "descripcion" => "Aplicaciones financieras que se originan en el incremento neto de saldos de inversiones\ntemporales. Esta cuenta indica las variaciones del nivel de colocaciones que realizan las\ntesorerías como consecuencia de la existencia de superávit temporal de caja.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "58000",
                "denominacion" => "Incremento de Cuentas y Documentos por Cobrar y Otros Activos Financieros",
                "descripcion" => "Aplicaciones financieras que se originan en el incremento neto de cuentas del activo exigible a\ncorto y largo plazo documentada y no documentada que constituye una institución pública. Su\ncálculo es consecuencia de políticas financieras de cobros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "58100",
                "denominacion" => "Incremento de Cuentas por Cobrar a Corto Plazo",
                "descripcion" => "Aplicaciones financieras que se originan en el incremento neto de saldos de las cuentas\npor cobrar a corto plazo.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "58200",
                "denominacion" => "Incremento de Documentos por Cobrar y Otros Activos Financieros a Corto Plazo",
                "descripcion" => "Aplicaciones financieras que se originan en el incremento neto de saldos de documentos\ny efectos por cobrar y otros activos financieros a corto plazo. Incluye las variaciones netas\nde saldos de anticipos financieros, activos diferidos y débitos por apertura de cartas de\ncrédito a corto plazo.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "58210",
                "denominacion" => "Incremento de Documentos por Cobrar a Corto Plazo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "58220",
                "denominacion" => "Incremento de Otros Activos Financieros a Corto Plazo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "58300",
                "denominacion" => "Incremento de Cuentas por Cobrar a Largo Plazo",
                "descripcion" => "Aplicaciones financieras que se originan en el incremento neto de saldos de las cuentas\npor cobrar a largo plazo.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "58400",
                "denominacion" => "Incremento de Documentos por Cobrar y Otros Activos Financieros a Largo Plazo",
                "descripcion" => "Aplicaciones financieras que se originan en el incremento neto de saldos de documentos\ny efectos por cobrar y otros activos financieros a largo plazo. Incluye las variaciones de\nsaldos de anticipos financieros, activos diferidos y débitos por apertura de cartas de\ncrédito a largo plazo.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "58410",
                "denominacion" => "Incremento de Documentos por Cobrar a Largo Plazo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "58420",
                "denominacion" => "Incremento de Otros Activos Financieros a largo Plazo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "59000",
                "denominacion" => "Afectaciones al Tesoro General de la Nación",
                "descripcion" => "Afectaciones a las cuentas fiscales del Tesoro General de la Nación y operaciones sin movimiento\nde efectivo, por transacciones efectuadas por el Tesoro General de la Nación por cuenta de las\nentidades del sector público y privado.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "59100",
                "denominacion" => "Afectaciones al Tesoro General de la Nación",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "60000",
                "denominacion" => "SERVICIO DE LA DEUDA PUBLICA Y DISMINUCION DE OTROS PASIVOS",
                "descripcion" => "Asignación de recursos para atender el pago de amortizaciones, intereses, comisiones de corto plazo y\nlargo plazo con residentes (Deuda Interna) y no residentes (Deuda Externa); la disminución de cuentas a\npagar de corto plazo y largo plazo, gastos devengados no pagados, disminución de depósitos de\nInstituciones Financieras; documentos y efectos a pagar y pasivos diferidos. Incluye el pago de beneficios\nsociales.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "61000",
                "denominacion" => "Servicio de la Deuda Pública Interna",
                "descripcion" => "Gastos destinados para atender el servicio de la Deuda Pública con residentes en el país. Incluye\nel rescate de títulos y valores y la cancelación de préstamos.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "61100",
                "denominacion" => "Amortización de la Deuda Pública Interna a Corto Plazo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "61200",
                "denominacion" => "Intereses de la Deuda Pública Interna a Corto Plazo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "61300",
                "denominacion" => "Comisiones y Otros Gastos de la Deuda Pública Interna a Corto Plazo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "61400",
                "denominacion" => "Intereses por Mora y Multas de la Deuda Pública Interna a Corto Plazo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "61600",
                "denominacion" => "Amortización de la Deuda Pública Interna a Largo Plazo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "61700",
                "denominacion" => "Intereses de la Deuda Pública Interna a Largo Plazo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "61800",
                "denominacion" => "Comisiones y Otros Gastos de la Deuda Pública Interna a Largo Plazo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "COR",
                "codigo" => "546",
                "denominacion" => "República de Corea",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "-",
                "codigo" => "62000",
                "denominacion" => "Servicio de la Deuda Pública Externa",
                "descripcion" => "Gastos destinados para atender el servicio de la Deuda Pública con no residentes en el país. Incluye\nel rescate de títulos y valores y la cancelación de préstamos.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "62100",
                "denominacion" => "Amortización de la Deuda Pública Externa a Corto Plazo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "62200",
                "denominacion" => "Intereses de la Deuda Pública Externa a Corto Plazo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "62300",
                "denominacion" => "Comisiones y Otros Gastos de la Deuda Pública Externa a Corto Plazo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "62400",
                "denominacion" => "Intereses por Mora y Multas de la Deuda Pública Externa a Corto Plazo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "62600",
                "denominacion" => "Amortización de la Deuda Pública Externa a Largo Plazo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "62700",
                "denominacion" => "Intereses de la Deuda Pública Externa a Largo Plazo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "62800",
                "denominacion" => "Comisiones y Otros Gastos de la Deuda Pública Externa a Largo Plazo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "62900",
                "denominacion" => "Intereses por Mora y Multas de la Deuda Pública Externa a Largo Plazo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "63000",
                "denominacion" => "Disminución de Cuentas por Pagar a Corto Plazo",
                "descripcion" => "Aplicaciones financieras que se originan en la disminución neta de saldos de cuentas por pagar a\ncorto plazo, documentada y no documentada que constituye una institución pública con\nproveedores, contratistas y otros. Su cálculo es el resultado de realizar mayores pagos que gastos\ndevengados en el ejercicio, de tal manera que la política financiera genere una disminución neta\nde los pasivos.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "63100",
                "denominacion" => "Disminución de Cuentas por Pagar a Corto Plazo por Deudas Comerciales con Proveedores",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "63200",
                "denominacion" => "Disminución de Cuentas por Pagar a Corto Plazo con Contratistas",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "63300",
                "denominacion" => "Disminución de Cuentas por Pagar a Corto Plazo por Sueldos y Jornales",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "63400",
                "denominacion" => "Disminución de Cuentas por Pagar a Corto Plazo por Aportes Patronales",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "63500",
                "denominacion" => "Disminución de Cuentas por Pagar a Corto Plazo por Retenciones",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "63600",
                "denominacion" => "Disminución de Cuentas por Pagar a Corto Plazo por Impuestos, Regalías y Tasas",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "63700",
                "denominacion" => "Disminución de Cuentas por Pagar a Corto Plazo por Jubilaciones y Pensiones",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "63800",
                "denominacion" => "Disminución de Cuentas por Pagar a Corto Plazo por Intereses",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "63900",
                "denominacion" => "Disminución de Otros Pasivos y Otras Cuentas por Pagar a Corto Plazo",
                "descripcion" => "Aplicaciones financieras que se originan en la disminución neta de saldos de otros pasivos\ny otras cuentas por pagar a corto plazo. Incluye las variaciones netas de saldos de\ndepósitos a la vista, depósitos en caja de ahorro y a plazo fijo de las instituciones\nfinancieras y la disminución neta de documentos y efectos comerciales por pagar, otros\ndocumentos y pasivos diferidos a corto plazo.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "64000",
                "denominacion" => "Disminución de Cuentas por Pagar a Largo Plazo",
                "descripcion" => "Aplicaciones financieras que se originan en la disminución neta de saldos de cuentas por pagar a\nlargo plazo, documentada y no documentada que tiene una institución pública con proveedores\ny contratistas.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "64100",
                "denominacion" => "Disminución de Cuentas por Pagar a Largo Plazo por Deudas Comerciales",
                "descripcion" => "Aplicaciones financieras que se originan en la disminución neta de saldos de cuentas por\npagar a largo plazo que tiene una institución pública por deudas comerciales con\nproveedores.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "64200",
                "denominacion" => "Disminución de Otras Cuentas por Pagar a Largo Plazo",
                "descripcion" => "Aplicaciones financieras que se originan en la disminución neta de saldos de otras cuentas\npor pagar a largo plazo. Incluye las variaciones netas de saldos de documentos y efectos\ncomerciales por pagar, otros documentos por pagar y pasivos diferidos a largo plazo.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "65000",
                "denominacion" => "Gastos Devengados No Pagados – TGN",
                "descripcion" => "Asignación de recursos destinados a cubrir gastos devengados en ejercicios anteriores que no han\nsido cancelados. Se utiliza en el Tesoro General de la Nación.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "65100",
                "denominacion" => "Gastos Devengados No Pagados por Servicios Personales",
                "descripcion" => "Asignación de recursos destinados a cubrir obligaciones generadas por gastos devengados\nen ejercicios anteriores por concepto de servicios personales que no han sido cancelados.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "65200",
                "denominacion" => "Gastos Devengados No Pagados por Servicios No Personales, Materiales y Suministros,\nActivos Reales y Financieros",
                "descripcion" => "Asignación de recursos destinados a cubrir obligaciones generadas por gastos devengados\nen ejercicios anteriores por concepto de servicios no personales, materiales y suministros,\nactivos reales y activos financieros que no han sido cancelados.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "65210",
                "denominacion" => "Gastos Devengados No Pagados por Servicios No Personales",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "65220",
                "denominacion" => "Gastos Devengados No Pagados por Materiales y Suministros",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "65230",
                "denominacion" => "Gastos Devengados No Pagados por Activos Reales",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "65240",
                "denominacion" => "Gastos Devengados No Pagados por Activos Financieros",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "65300",
                "denominacion" => "Gastos Devengados No Pagados por Transferencias",
                "descripcion" => "Asignación de recursos destinados a cubrir obligaciones generadas por gastos devengados\nen ejercicios anteriores por concepto de transferencias que no han sido canceladas.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "65400",
                "denominacion" => "Gastos Devengados No Pagados por Retenciones",
                "descripcion" => "Asignación de recursos destinados a cubrir obligaciones generadas en ejercicios anteriores\npor concepto de retenciones no canceladas, en favor de acreedores.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "65500",
                "denominacion" => "Gastos Devengados No Pagados por Intereses Deuda Pública Interna",
                "descripcion" => "Asignación de recursos destinados a cubrir obligaciones generadas en ejercicios anteriores\npor concepto de intereses de Deuda Pública Interna no canceladas.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "65600",
                "denominacion" => "Gastos Devengados No Pagados por Intereses Deuda Pública Externa",
                "descripcion" => "Asignación de recursos destinados a cubrir obligaciones generadas en ejercicios anteriores\npor concepto de intereses de Deuda Pública Externa no canceladas.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "65700",
                "denominacion" => "Gastos Devengados No Pagados por Comisiones Deuda Pública Interna",
                "descripcion" => "Asignación de recursos destinados a cubrir obligaciones generadas en ejercicios anteriores\npor concepto de comisiones de Deuda Pública Interna no canceladas.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "65800",
                "denominacion" => "Gastos Devengados No Pagados por Comisiones Deuda Pública Externa",
                "descripcion" => "Asignación de recursos destinados a cubrir obligaciones generadas en ejercicios anteriores\npor concepto de comisiones de Deuda Pública Externa no canceladas.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "65900",
                "denominacion" => "Otros Gastos Devengados No Pagados",
                "descripcion" => "Asignación de recursos destinados a cubrir obligaciones generadas por gastos devengados\ny no pagados en ejercicios anteriores, por conceptos no incorporados en las partidas anteriores.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "66000",
                "denominacion" => "Gastos Devengados No Pagados – Otras Fuentes",
                "descripcion" => "Asignación de recursos destinados a cubrir gastos devengados no pagados en ejercicios\nanteriores, con recursos diferentes al T.G.N.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "66100",
                "denominacion" => "Gastos Devengados No Pagados por Servicios Personales",
                "descripcion" => "Asignación de recursos destinados a cubrir obligaciones generadas por gastos devengados\nno pagados en ejercicios anteriores, por concepto de servicios personales.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "66200",
                "denominacion" => "Gastos Devengados No Pagados por Servicios No Personales, Materiales y Suministros,\nActivos Reales y Financieros, y Servicio de la Deuda",
                "descripcion" => "Asignación de recursos destinados a cubrir obligaciones generadas por gastos devengados\nno pagados en ejercicios anteriores por concepto de servicios no personales, materiales y\nsuministros, activos reales y activos financieros, y servicio de la deuda.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "66210",
                "denominacion" => "Gastos Devengados No Pagados por Servicios No Personales",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "66220",
                "denominacion" => "Gastos Devengados No Pagados por Materiales y Suministros",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "66230",
                "denominacion" => "Gastos Devengados No Pagados por Activos Reales",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "66240",
                "denominacion" => "Gastos Devengados No Pagados por Activos Financieros",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "66250",
                "denominacion" => "Gastos Devengados No Pagados por Servicio de la Deuda",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "66300",
                "denominacion" => "Gastos Devengados No Pagados por Transferencias",
                "descripcion" => "Asignación de recursos destinados a cubrir obligaciones generadas por gastos devengados\nno pagados en ejercicios anteriores, por concepto de transferencias.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "66400",
                "denominacion" => "Gastos Devengados No pagados por Retenciones",
                "descripcion" => "Asignación de recursos destinados a cubrir obligaciones generadas en ejercicios anteriores\npor concepto de retenciones no canceladas, en favor de acreedores.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "66900",
                "denominacion" => "Otros Gastos No Pagados",
                "descripcion" => "Asignación de recursos destinados a cubrir obligaciones generadas por gastos devengados\nno pagados en ejercicios anteriores, por conceptos no incorporados en las partidas\nanteriores.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "67000",
                "denominacion" => "Obligaciones por Afectaciones al Tesoro General de la Nación",
                "descripcion" => "Obligaciones por concepto de afectaciones realizadas a las cuentas fiscales del Tesoro General de\nla Nación y por operaciones sin movimiento de efectivo; así como para el pago del servicio de la\ndeuda pública y disminución de otros pasivos.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "67100",
                "denominacion" => "Obligaciones por Afectaciones al Tesoro General de la Nación",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "68000",
                "denominacion" => "Disminución de Otros Pasivos",
                "descripcion" => "Asignación de recursos para cubrir el pago de beneficios sociales.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "68200",
                "denominacion" => "Pago de Beneficios Sociales",
                "descripcion" => "Asignación de recursos para cubrir el pago efectivo realizado por las entidades del sector\npúblico a favor de sus servidores públicos, por concepto de beneficios sociales, de acuerdo\na la normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "69000",
                "denominacion" => "Devolución de Fondos -Fideicomisos",
                "descripcion" => "Asignación de recursos para cubrir la devolución de fondos recibidos en fideicomiso de corto y\nlargo plazo realizados por la institución fiduciaria y el pago de recursos recibidos de fideicomisos\npor la institución beneficiaria.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "69100",
                "denominacion" => "Devolución de Fondos - Fideicomiso de Corto Plazo",
                "descripcion" => "Asignación de recursos para cubrir la devolución de fondos recibidos en fideicomiso de\ncorto plazo realizados por la institución fiduciaria.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "69200",
                "denominacion" => "Devolución de Fondos - Fideicomiso de Largo Plazo",
                "descripcion" => "Asignación de recursos para cubrir la devolución de fondos recibidos en fideicomiso de\nlargo plazo realizados por la institución fiduciaria.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "70000",
                "denominacion" => "TRANSFERENCIAS",
                "descripcion" => "Gastos que corresponden a transacciones que no suponen contraprestación en bienes o servicios\ny cuyos importes no son reintegrados por los beneficiarios.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "71000",
                "denominacion" => "Transferencias Corrientes al Sector Privado",
                "descripcion" => "Transferencias corrientes en efectivo y/o en especie que se otorgan al sector privado de la economía.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "71100",
                "denominacion" => "Pensiones y Jubilaciones",
                "descripcion" => "Créditos asignados para gastos por concepto de pensiones y jubilaciones y otros de la\nmisma naturaleza.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "71200",
                "denominacion" => "Becas",
                "descripcion" => "Becas de estudios otorgadas a servidores públicos, estudiantes universitarios y\nparticulares.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "71210",
                "denominacion" => "Becas de Estudios Otorgadas a los Servidores Públicos",
                "descripcion" => "Son los recursos destinados al pago de becas de estudio otorgadas a servidores públicos.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "71220",
                "denominacion" => "Becas de Estudios Otorgadas a los Estudiantes Universitarios",
                "descripcion" => "Recursos destinados al pago de auxiliares de docencia, auxiliares de investigación,\ninternado rotatorio, becas trabajo, trabajo dirigido y otros establecidos por\nnorma.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "71230",
                "denominacion" => "Becas de Estudios Otorgadas a Particulares",
                "descripcion" => "Son los recursos destinados al pago de becas de estudio otorgadas a particulares.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "71300",
                "denominacion" => "Donaciones, Ayudas Sociales y Premios a Personas",
                "descripcion" => "Donaciones, ayudas y premios de tipo social, de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "71500",
                "denominacion" => "Subsidios a Personas ó Instituciones Privadas",
                "descripcion" => "Subsidios a personas ó Instituciones Privadas que realizan actividades de producción\nagrícola, de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "71600",
                "denominacion" => "Subsidios y Donaciones a Personas e Instituciones Privadas sin Fines de Lucro",
                "descripcion" => "Subvenciones destinadas a Instituciones privadas sin fines de lucro, a efecto de auxiliar y\nestimular la actividad que éstas realizan, y otros de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "71610",
                "denominacion" => "A Personas e Instituciones Privadas sin Fines de Lucro",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "71630",
                "denominacion" => "Otros de Carácter Social Establecidos por Norma Legal",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "71700",
                "denominacion" => "Subvenciones Económicas a Empresas",
                "descripcion" => "Recursos destinados para financiar las operaciones o gastos financieros de empresas del\nsector privado.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "71800",
                "denominacion" => "Pensiones Vitalicias",
                "descripcion" => "Transferencias a beneméritos de guerra, personajes notables y otras pensiones\nconcedidas de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "71900",
                "denominacion" => "Transferencias por las Compras de Control Tributario",
                "descripcion" => "Transferencias por concepto de la ejecución de operativos de control, a través de la\nmodalidad de Compras de Control, que por su naturaleza no pueden ser devueltos a los\nsujetos pasivos o terceros, los mismos que son transferidos a entidades de beneficencia o\nasistencia social.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "72000",
                "denominacion" => "Transferencias Corrientes al Sector Público No Financiero por Participación en Tributos",
                "descripcion" => "Transferencias corrientes a entidades públicas por participación de recaudaciones tributarias,\nsegún el sistema tributario vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "72200",
                "denominacion" => "Transferencias Corrientes a Instituciones Públicas Descentralizadas, Universidades\nPúblicas por Participación en Tributos",
                "descripcion" => "Transferencias a Instituciones Públicas Descentralizadas, Universidades Públicas por\nparticipaciones en tributos, de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "72400",
                "denominacion" => "Transferencias Corrientes al Gobierno Autónomo Departamental por Participación en\nTributos",
                "descripcion" => "Transferencias al Gobierno Departamental por participación en tributos, de acuerdo a\nnormativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "72410",
                "denominacion" => "Para Educación",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "72500",
                "denominacion" => "Transferencias Corrientes a los Gobiernos Autónomos Municipales e Indígena Originario\nCampesino por Participación en Tributos",
                "descripcion" => "Transferencias por participación en tributos, de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "72510",
                "denominacion" => "Para Salud",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "72520",
                "denominacion" => "Otras",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "73000",
                "denominacion" => "Transferencias Corrientes al Sector Público No Financiero por Subsidios o Subvenciones",
                "descripcion" => "Transferencias corrientes al Sector Público No Financiero por concepto de subsidios y\nsubvenciones, de acuerdo a disposiciones legales específicas o por acto administrativo del\ngobierno, destinadas a financiar sus actividades corrientes. Incluye asignaciones para programas\ny gastos específicos no contemplados en la categoría proyectos.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "73100",
                "denominacion" => "Transferencias Corrientes al Órgano Ejecutivo del Estado Plurinacional por Subsidios o\nSubvenciones",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "73200",
                "denominacion" => "Transferencias Corrientes a los Órganos Legislativo, Judicial y Electoral, Entidades de\nControl y Defensa, Descentralizadas y Universidades por Subsidios o Subvenciones",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "73300",
                "denominacion" => "Transferencias Corrientes del Fondo Compensatorio Nacional de Salud",
                "descripcion" => "Transferencias del Ministerio de Salud, a los Gobiernos Autónomos Municipales e\nIndígena Originario Campesino, a objeto de apoyar el financiamiento de las prestaciones\nde servicios de salud integral, de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "73400",
                "denominacion" => "Transferencias Corrientes a Entidades Territoriales Autónomas por Subsidios o\nSubvenciones",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "73410",
                "denominacion" => "Gobierno Autónomo Departamental",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "73420",
                "denominacion" => "Gobierno Autónomo Municipal",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "73430",
                "denominacion" => "Gobierno Autónomo Indígena Originario Campesino",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "73440",
                "denominacion" => "Gobierno Autónomo Regional",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "73600",
                "denominacion" => "Transferencias Corrientes a Instituciones de Seguridad Social por Subsidios o\nSubvenciones",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "73700",
                "denominacion" => "Transferencias Corrientes a Empresas Públicas Nacionales por Subsidios o Subvenciones",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "73800",
                "denominacion" => "Transferencias Corrientes a Empresas Públicas de las Entidades Territoriales Autónomas\npor Subsidios o Subvenciones",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "73810",
                "denominacion" => "Empresas Públicas Departamentales",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "73820",
                "denominacion" => "Empresas Públicas Municipales",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "73830",
                "denominacion" => "Empresas Públicas Indígenas Originarias Campesinas",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "73840",
                "denominacion" => "Empresa Públicas Regionales",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "74000",
                "denominacion" => "Transferencias Corrientes al Sector Público Financiero",
                "descripcion" => "Transferencias a entidades del Sector Público Financiero, Bancario y no Bancario, de acuerdo a disposiciones legales específicas o por acto administrativo del gobierno. Incluye asignaciones para\nprogramas y gastos específicos no contemplados en la categoría proyectos.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "74100",
                "denominacion" => "Transferencias Corrientes a Instituciones Públicas Financieras No Bancarias",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "74200",
                "denominacion" => "Transferencias Corrientes a Instituciones Públicas Financieras Bancarias",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "75000",
                "denominacion" => "Transferencias de Capital al Sector Privado",
                "descripcion" => "Transferencias de capital en efectivo y/o en especie que tienen por finalidad financiar programas\nespecíficos de inversión de personas naturales o jurídicas privadas, de acuerdo a normativa\nvigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "75100",
                "denominacion" => "Transferencias de Capital a Personas",
                "descripcion" => "Transferencias a personas naturales que tengan por destino financiar las adquisiciones de\nequipos, construcciones u otros activos.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "75110",
                "denominacion" => "En Efectivo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "75120",
                "denominacion" => "En Especie",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "75200",
                "denominacion" => "Transferencias de Capital a Instituciones Privadas sin Fines de Lucro",
                "descripcion" => "Transferencias a Instituciones Privadas sin fines de lucro que tienen por destino financiar\nla adquisición de equipos, construcciones, inversiones financieras u otros gastos de\ncapital. Incluye transferencias para programas y proyectos de desarrollo económico,\nproductivo y social, de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "75210",
                "denominacion" => "A Instituciones Privadas sin Fines de Lucro",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "75211",
                "denominacion" => "En Efectivo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "75212",
                "denominacion" => "En Especie",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "75220",
                "denominacion" => "Otras de carácter económico – productivo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "75221",
                "denominacion" => "En Efectivo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "75222",
                "denominacion" => "En Especie",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "75300",
                "denominacion" => "Transferencias de Capital a Empresas Privadas",
                "descripcion" => "Transferencias a empresas privadas que tengan por destino financiar la adquisición de\nequipos, construcciones, proveer fondos para inversiones financieras u otros gastos de\ncapital.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "75310",
                "denominacion" => "En Efectivo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "75320",
                "denominacion" => "En Especie",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "77000",
                "denominacion" => "Transferencias de Capital al Sector Público No Financiero por Subsidios o Subvenciones",
                "descripcion" => "Subsidios o subvenciones a entidades del Sector Público No Financiero, para financiar gastos de\ncapital.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "77100",
                "denominacion" => "Transferencias de Capital al Órgano Ejecutivo del Estado Plurinacional por Subsidios o\nSubvenciones",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "77200",
                "denominacion" => "Transferencias de Capital a los Órganos Legislativo, Judicial y Electoral, Entidades de\nControl y Defensa, Descentralizadas y Universidades por Subsidios o Subvenciones",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "77400",
                "denominacion" => "Transferencias de Capital a las Entidades Territoriales Autónomas por Subsidios o\nSubvenciones",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "77410",
                "denominacion" => "Al Gobierno Autónomo Departamental",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "77440",
                "denominacion" => "Al Gobierno Autónomo Regional",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "77500",
                "denominacion" => "Transferencias de Capital a los Gobiernos Autónomos Municipales e Indígena Originario\nCampesino por Subsidios o Subvenciones",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "77520",
                "denominacion" => "Por Patentes Petroleras",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "77530",
                "denominacion" => "Otras",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "77600",
                "denominacion" => "Transferencias de Capital a Instituciones de Seguridad Social por Subsidios o Subvenciones",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "77700",
                "denominacion" => "Transferencias de Capital a Empresas Públicas Nacionales por Subsidios o Subvenciones",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "77800",
                "denominacion" => "Transferencias de Capital a Empresas Públicas de las Entidades Territoriales Autónomas\npor Subsidios o Subvenciones",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "77810",
                "denominacion" => "A Empresas Públicas Departamentales",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "77820",
                "denominacion" => "A Empresas Públicas Municipales",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "77830",
                "denominacion" => "A Empresas Públicas Indígenas Originarias y Campesinas",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "77840",
                "denominacion" => "A Empresas Públicas Regionales",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "CHINA",
                "codigo" => "548",
                "denominacion" => "República Popular China",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "-",
                "codigo" => "78000",
                "denominacion" => "Transferencias de Capital al Sector Público Financiero",
                "descripcion" => "Transferencias de capital otorgadas a Instituciones Públicas Financieras, Bancarias y no Bancarias\npara financiar gastos específicos de capital.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "78100",
                "denominacion" => "Transferencias de Capital a Instituciones Públicas Financieras No Bancarias",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "78200",
                "denominacion" => "Transferencias de Capital a Instituciones Públicas Financieras Bancarias",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "79000",
                "denominacion" => "Transferencias al Exterior",
                "descripcion" => "Transferencias al exterior que se realizan a gobiernos extranjeros, organismos internacionales o a\ncualquier otro beneficiario del exterior.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "79100",
                "denominacion" => "Transferencias Corrientes a Gobiernos Extranjeros y Organismos Internacionales por\nCuotas Regulares",
                "descripcion" => "Transferencias efectuadas a Organismos Internacionales por cuotas establecidas de\nacuerdo con el carácter de Estado Miembro o por participación en una organización\ninternacional determinada como: PNUD, UNICEF, OIT, CIAT, etc.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "79200",
                "denominacion" => "Transferencias Corrientes a Gobiernos Extranjeros y Organismos Internacionales por\nCuotas Extraordinarias",
                "descripcion" => "Transferencias efectuadas a Organismos Internacionales por cuotas extraordinarias\nacordadas y de acuerdo con el carácter de Estado Miembro. Incluye también,\ntransferencias extraordinarias a gobiernos extranjeros, de acuerdo con convenios establecidos.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "79300",
                "denominacion" => "Otras Transferencias Corrientes al Exterior",
                "descripcion" => "Se refiere a otras transferencias corrientes efectuadas al exterior, no contempladas en las\npartidas anteriores, incluye donaciones y ayudas de tipo social en efectivo y/o especie, que no revisten carácter permanente a organismos extranjeros, de acuerdo a normativa\nvigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "79310",
                "denominacion" => "Transferencias al Exterior en Efectivo",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "79320",
                "denominacion" => "Transferencias al Exterior en Especie",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "79400",
                "denominacion" => "Transferencias de Capital al Exterior",
                "descripcion" => "Transferencias que se realizan a favor de gobiernos u organismos del exterior, que tienen\npor destino financiar gastos de capital, incluye donaciones.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "80000",
                "denominacion" => "IMPUESTOS, REGALIAS Y TASAS",
                "descripcion" => "Gastos realizados por las instituciones públicas destinados a cubrir el pago de impuestos, regalías y tasas.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "81000",
                "denominacion" => "Renta Interna",
                "descripcion" => "Gastos realizados por las instituciones públicas destinados a cubrir las obligaciones impositivas.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "81100",
                "denominacion" => "Impuesto sobre las Utilidades de las Empresas",
                "descripcion" => "Créditos destinados al pago de impuestos a las utilidades de las empresas, de acuerdo a\nnormativa vigente. Incluye las utilidades de las empresas mineras.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "81200",
                "denominacion" => "Impuesto a las Transacciones",
                "descripcion" => "Créditos destinados al pago de impuestos sobre los ingresos brutos devengados durante\nel período fiscal por el ejercicio de industria, comercio, oficio, negocio, alquiler de bienes,\nejecución de obras o prestación de servicios de cualquier índole, sean éstas lucrativas o\nno, de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "81300",
                "denominacion" => "Impuesto al Valor Agregado Mercado Interno",
                "descripcion" => "Créditos destinados al pago del Impuesto al Valor Agregado (IVA), por concepto de venta\nde mercancías en general, contratos de obra, servicios técnicos y profesionales, servicios\npúblicos y privados, alquileres y otros tipos de ingresos, realizados con agentes\neconómicos residentes en el país.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "81400",
                "denominacion" => "Impuesto al Valor Agregado Importaciones",
                "descripcion" => "Créditos destinados al pago del Impuesto al Valor Agregado (IVA), por concepto de\nimportación de mercancías en general.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "81500",
                "denominacion" => "Impuesto a los Consumos Específicos Mercado Interno",
                "descripcion" => "Créditos destinados al pago de impuestos por la producción o consumo de bebidas\nalcohólicas, alcoholes, cigarrillos y tabacos, vehículos automóviles y otras establecidas por\nnorma legal vigente, realizadas en el país.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "81600",
                "denominacion" => "Impuesto a los Consumos Específicos Importaciones",
                "descripcion" => "Créditos destinados al pago de impuestos por la importación de cigarrillos y tabacos,\nbebida no alcohólicas y alcohólicas, alcoholes sin desnaturalizar y vehículos automóviles.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "81700",
                "denominacion" => "Impuesto Especial a los Hidrocarburos y sus Derivados Mercado Interno",
                "descripcion" => "Créditos destinados a las empresas comercializadoras de hidrocarburos para el pago del\nimpuesto especial a los Hidrocarburos y sus derivados de importaciones.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "81800",
                "denominacion" => "Impuesto Especial a los Hidrocarburos y sus Derivados Importación",
                "descripcion" => "Créditos destinados a las empresas comercializadoras de hidrocarburos para el pago de\nimpuestos especial a los Hidrocarburos y sus derivados de importación.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "81900",
                "denominacion" => "Otros Impuestos",
                "descripcion" => "Créditos destinados a cubrir otros impuestos no detallados anteriormente como por\nejemplo:",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "81910",
                "denominacion" => "Impuesto a las Salidas Aéreas al Exterior",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "81950",
                "denominacion" => "Impuesto a la Transmisión Gratuita de Bienes- ITGB",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "81960",
                "denominacion" => "Impuesto a las Transacciones Financieras – ITF",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "81990",
                "denominacion" => "Otros",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "82000",
                "denominacion" => "Renta Aduanera",
                "descripcion" => "Gastos realizados por las instituciones públicas destinados a cubrir las obligaciones impositivas\npor importaciones realizadas.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "82100",
                "denominacion" => "Gravamen Arancelario",
                "descripcion" => "Créditos destinados al pago del gravamen sobre el valor de las importaciones CIF Frontera\no CIF Aduana que ingresen a recintos aduaneros, de acuerdo al medio de transporte\nutilizado.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "83000",
                "denominacion" => "Impuestos Municipales",
                "descripcion" => "Gastos realizados por las entidades públicas destinados a cubrir las obligaciones impositivas por\ntenencia de bienes inmuebles y vehículos automotores, y las transferencias de estos bienes.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "83100",
                "denominacion" => "Impuesto a la Propiedad de Bienes",
                "descripcion" => "Créditos destinados al pago de los impuestos a la propiedad de bienes inmuebles y\nvehículos automotores situados o registrados en el territorio nacional, recaudados por las\nmunicipalidades en cuya jurisdicción se encuentren situados o registrados los mismos, de\nacuerdo a normativa tributaria vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "83110",
                "denominacion" => "Bienes Inmuebles",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "83120",
                "denominacion" => "Vehículos Automotores",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "83200",
                "denominacion" => "Impuesto a las Transferencias onerosas de bienes inmuebles y vehículos automotores",
                "descripcion" => "Créditos destinados al pago del impuesto que grava a la transferencia de bienes inmuebles\ny vehículos automotores, de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "83210",
                "denominacion" => "Bienes Inmuebles",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "83220",
                "denominacion" => "Vehículos Automotores",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "84000",
                "denominacion" => "Regalías",
                "descripcion" => "Gastos realizados por las instituciones públicas destinados al pago de regalías por la explotación\nde recursos agropecuarios, yacimientos mineros, petrolíferos y otros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "84100",
                "denominacion" => "Regalías Mineras",
                "descripcion" => "Créditos destinados al pago de regalías por la explotación de yacimientos mineros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "MIN04",
                "codigo" => "2 1 4",
                "denominacion" => "INDUSTRIALIZACIÓN MINERA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "-",
                "codigo" => "84200",
                "denominacion" => "Regalías por Hidrocarburos",
                "descripcion" => "Créditos destinados al pago de regalías por la explotación de yacimientos petrolíferos.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "84230",
                "denominacion" => "6% Participación TGN",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "84240",
                "denominacion" => "11% Sobre Producción por Regalías Departamentales",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "84250",
                "denominacion" => "1% Sobre Producción para Regalías Compensatoria Departamental",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "84300",
                "denominacion" => "Regalías Agropecuarias",
                "descripcion" => "Créditos destinados al pago de regalías por la explotación de recursos agropecuarios.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "84900",
                "denominacion" => "Otras Regalías",
                "descripcion" => "Créditos destinados al pago de regalías por la explotación de otros recursos no descritos\nanteriormente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "85000",
                "denominacion" => "Tasas, Multas y Otros",
                "descripcion" => "Gastos realizados por las instituciones públicas destinados al pago por concepto de tasas,\nderechos, multas, intereses penales y otros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "85100",
                "denominacion" => "Tasas",
                "descripcion" => "Créditos destinados al pago por la prestación efectiva de un servicio público\nindividualizado en el contribuyente, como el arancel de derechos reales, peajes, valores\nfiscales, servicio civil y otros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "85200",
                "denominacion" => "Derechos",
                "descripcion" => "Créditos destinados al pago por la prestación efectiva de derechos administrativos, como\nser matrículas e inscripciones en instituciones públicas y otros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "85300",
                "denominacion" => "Contribuciones por Mejoras",
                "descripcion" => "Créditos destinados al pago para la ejecución de obras de mejoramiento público.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "85400",
                "denominacion" => "Multas",
                "descripcion" => "Créditos destinados al pago por concepto de penas pecuniarias originadas en el\nincumplimiento del ordenamiento legal vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "85500",
                "denominacion" => "Intereses Penales",
                "descripcion" => "Créditos destinados al pago de penas pecuniarias debido a la falta de pago o pago atrasado\npor la entrega de un bien o la prestación de un servicio público.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "85900",
                "denominacion" => "Otros",
                "descripcion" => "Créditos destinados al pago de otros conceptos no clasificados anteriormente, incluye el\npago de presentación de planillas salariales al Registro Obligatorio de Empleadores – ROE.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "86000",
                "denominacion" => "Patentes",
                "descripcion" => "Gastos realizados por las entidades públicas destinados a cubrir el costo por el uso y\naprovechamiento de bienes de dominio público y la realización de actividades económicas en una\ndeterminada jurisdicción territorial.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "86100",
                "denominacion" => "Patentes",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "90000",
                "denominacion" => "OTROS GASTOS",
                "descripcion" => "Gastos destinados a intereses por operaciones de las instituciones financieras; beneficios sociales y otros.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "91000",
                "denominacion" => "Intereses de Instituciones Financieras",
                "descripcion" => "Gastos por intereses ocasionados por las operaciones regulares de las instituciones financieras;\ntales como los intereses que pagan los bancos a los ahorristas.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "91100",
                "denominacion" => "Intereses de Instituciones Públicas Financieras no Bancarias",
                "descripcion" => "Gastos por intereses ocasionados por las operaciones regulares financieras que realizan\nlas Instituciones Financieras no Bancarias.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "91200",
                "denominacion" => "Intereses de Instituciones Públicas Financieras Bancarias",
                "descripcion" => "Gastos por intereses ocasionados por las operaciones regulares financieras que realizan\nlas Instituciones Financieras Bancarias.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "94000",
                "denominacion" => "Beneficios Sociales y Otros",
                "descripcion" => "Gastos destinados a cubrir el pago por concepto de desahucio y otros de naturaleza similar.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "94100",
                "denominacion" => "Indemnización",
                "descripcion" => "Asignación de recursos destinados a cubrir pagos por concepto de retiros, de acuerdo a\nnormativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "94200",
                "denominacion" => "Desahucio",
                "descripcion" => "Asignación de recursos destinados a cubrir pagos por concepto derivado del\nincumplimiento del preaviso de retiro, de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "94300",
                "denominacion" => "Otros Beneficios Sociales",
                "descripcion" => "Son otros gastos relacionados con beneficios sociales, de acuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "95000",
                "denominacion" => "Contingencias Judiciales",
                "descripcion" => "Gastos destinados, para cubrir pagos por obligaciones legales y debidamente ejecutoriadas.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "95100",
                "denominacion" => "Contingencias Judiciales",
                "descripcion" => "Gastos que se originan en obligaciones legales y debidamente ejecutoriadas. No incluye\ngastos correspondientes a servicios judiciales.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "96000",
                "denominacion" => "Otras Pérdidas y Devoluciones",
                "descripcion" => "Otras pérdidas no contempladas en las partidas anteriores que suelen ocurrir en las instituciones,\ncomo ser: pérdidas por operaciones cambiarias. Incluye devoluciones de impuestos, tasas, multas,\nregalías cuyos pagos se hayan realizado en exceso y correspondan a gestiones anteriores.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "96100",
                "denominacion" => "Pérdidas en Operaciones Cambiarias",
                "descripcion" => "Pérdidas en operaciones que se realizan con divisas extranjeras y con mantenimiento de\nvalor, por incremento o disminución del tipo de cambio.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "96200",
                "denominacion" => "Devoluciones",
                "descripcion" => "Comprende gastos por devoluciones en general tales como impuestos, tasas, multas,\nregalías, patentes, y otros pagados en exceso en gestiones anteriores.\nIncluye devoluciones por concepto de incapacidad temporal, la devolución de recursos\nmonetizables y no monetizables al organismo financiador o entidad del Sector Público y otras devoluciones enmarcadas en las actividades de las entidades públicas.\nNo incluye las devoluciones de impuestos clasificados como CEDEIM.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "96900",
                "denominacion" => "Otras Pérdidas",
                "descripcion" => "Incorpora otras pérdidas no consideradas en las partidas anteriores.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "97000",
                "denominacion" => "Comisiones y Bonificaciones",
                "descripcion" => "Representan gastos por comisiones y bonificaciones a terceros por la venta de bienes o servicios.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "97100",
                "denominacion" => "Comisiones por Ventas",
                "descripcion" => "Apropiación por concepto de comisión en ventas que realizan las instituciones.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "97200",
                "denominacion" => "Bonificaciones por Ventas",
                "descripcion" => "Apropiación por concepto de bonificaciones en ventas que realizan las instituciones en\nsus operaciones.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "98000",
                "denominacion" => "Retiros de Capital",
                "descripcion" => "Apropiación por concepto de retiros de capital, tanto del sector público como privado.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "98100",
                "denominacion" => "Del Sector Público",
                "descripcion" => "Apropiaciones para retiros de las instituciones públicas.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "98200",
                "denominacion" => "Del Sector Privado",
                "descripcion" => "Apropiaciones para retiros de las instituciones privadas.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "98300",
                "denominacion" => "Pago de Dividendos",
                "descripcion" => "Gastos emergentes de la distribución de utilidades generadas en el periodo anterior a\naccionistas por participación y aporte de capital en empresas del sector público, de\nacuerdo a normativa vigente.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "99000",
                "denominacion" => "Provisiones para Gastos Corrientes y de Capital",
                "descripcion" => "",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "99100",
                "denominacion" => "Provisiones para Gastos de Capital",
                "descripcion" => "Provisiones de recursos para financiar gastos de capital.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "-",
                "codigo" => "99200",
                "denominacion" => "Provisiones para Gastos Corrientes",
                "descripcion" => "Provisiones de recursos para financiar contingencias y otros gastos corrientes.",
                "fk_id_clasificador" => 3
            ],
            [
                "sigla" => "ONU MUJERES",
                "codigo" => "742",
                "denominacion" => "Entidad de las Naciones Unidas para la Igualdad de Género y Empoderamiento de las Mujeres",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "-",
                "codigo" => "1.",
                "denominacion" => "SERVICIOS PÚBLICOS GENERALES",
                "descripcion" => "Acciones que realizan las entidades del Sector Publico destinadas al cumplimiento de funciones tales\ncomo: ejecutiva y legislativa, asuntos financieros y fiscales, asuntos exteriores; ayuda económica exterior;\nservicios generales; investigación básica; investigación y desarrollo relacionados con los servicios públicos\ngenerales; otros servicios públicos generales; transacciones de la deuda pública y transferencias de\ncarácter general entre diferentes niveles de gobierno.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "1.1.",
                "denominacion" => "Órganos ejecutivos y legislativos, asuntos financieros y fiscales, asuntos exteriores",
                "descripcion" => "",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "1.1.1.",
                "denominacion" => "Órganos Ejecutivos y Legislativos",
                "descripcion" => "Administración, gestión o apoyo de los órganos ejecutivos y legislativos.\nAsuntos de administración general a cargo del jefe ejecutivo en todos los niveles de gobierno:\noficina del presidente, gobernador, ejecutivo regional, alcalde y ejecutivo de los Gobiernos\nAutónomos Indígena Originario Campesinos, en sus respectivos ámbitos; órganos legislativos\n(Cámara de Senadores, Cámara de Diputados, Asambleas Departamentales, Asambleas\nRegionales, Concejos Municipales, y Gobiernos Autónomos Indígena Originario Campesinos), y\npersonal asesor, administrativo y político adjunto a las oficinas de los jefes ejecutivos y de las\nCámaras legislativas, Asambleas Departamentales y Concejos Municipales; bibliotecas y otros\nservicios de consulta que se hallan principalmente al servicio de los órganos ejecutivos y\nlegislativos; elementos materiales a disposición del jefe ejecutivo, comisiones y comités\npermanentes o temporales creados por el jefe ejecutivo. Incluye las acciones relacionadas con\nactividades de fortalecimiento institucional y gastos de entidades territoriales destinados hacia la\ngestión y apoyo del proceso autonómico en sus diferentes expresiones.\nExcluye: oficinas ministeriales, oficinas de jefes de departamentos de las administraciones\npúblicas locales y otros, que desempeñan una función concreta (clasificados atendiendo a la\nfunción).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "1.1.2.",
                "denominacion" => "Asuntos financieros y fiscales",
                "descripcion" => "Gestión del Ministerio de Economía y Finanzas Públicas, la oficina del presupuesto, la\nadministración de rentas internas, la administración de aduanas, los servicios de contabilidad y\nauditoría; administración de asuntos y servicios financieros y fiscales; gestión de los fondos\npúblicos y de la deuda pública; administración de planes impositivos; producción y difusión de\ninformación general, documentación técnica y estadísticas sobre asuntos y servicios financieros y\nfiscales. Asuntos y servicios financieros en todos los niveles del sector público.\nIncluye: Asuntos y servicios financieros en todos los niveles de Gobierno. Excluye: derechos cobrados por los servicios de suscripción o emisión de valores y pagos de los\nintereses de empréstitos públicos (01.7.0); supervisión de la banca (04.1.1).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "1.1.3.",
                "denominacion" => "Asuntos exteriores",
                "descripcion" => "Administración de asuntos y servicios exteriores.\nGestión del Ministerio de Relaciones Exteriores y de las misiones diplomáticas y consulares\ndestacadas en el extranjero; funcionamiento de las misiones diplomáticas y representaciones\nante organismos internacionales; gestión de reivindicación marítima, gestión o apoyo de los\nservicios informativos y culturales destinados a la distribución fuera de las fronteras nacionales;\nlas cuotas por suscripciones ordinarias y contribuciones especiales para sufragar los gastos\ngenerales de funcionamiento de organizaciones internacionales.\nExcluye: ayuda económica a los países en desarrollo y los países en transición (01.2.1); misiones\nde ayuda económica acreditadas ante gobiernos extranjeros (01.2.1); contribuciones a los\nprogramas de ayuda administrados por organizaciones internacionales o regionales (01.2.2);\nunidades militares destacadas en el extranjero (02.1.0); ayuda militar a otros países (02.3.0);\nasuntos económicos y comerciales exteriores generales (04.1.1); asuntos y servicios de turismo\n(04.7.3).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "1.2.",
                "denominacion" => "Ayuda económica exterior",
                "descripcion" => "",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "1.2.1.",
                "denominacion" => "Ayuda económica a los países en desarrollo y en transición",
                "descripcion" => "Gastos de administración para la cooperación económica con los países en desarrollo y los países\nen transición; gestión de misiones de ayuda económica acreditadas ante gobiernos de otros\npaíses; gestión o apoyo de programas de asistencia técnica, programas de capacitación y planes\nde becas de estudio o perfeccionamiento; ayuda económica en forma de donaciones (en efectivo\no en especie) o préstamos (sea cual fuere el tipo de interés).\nExcluye: contribuciones a los fondos para el desarrollo económico administrados por\norganizaciones internacionales o regionales (01.2.2); ayuda militar a otros países (02.3.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "1.2.2.",
                "denominacion" => "Ayuda económica prestada a través de organizaciones internacionales",
                "descripcion" => "Gastos de administración para la ayuda económica prestada por conducto de organizaciones\ninternacionales; contribuciones en efectivo o en especie a los fondos para el desarrollo económico\nadministrados por organizaciones internacionales, regionales o multinacionales de otra índole.\nExcluye: ayuda a operaciones internacionales de mantenimiento de la paz (02.3.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "1.3.",
                "denominacion" => "Servicios generales",
                "descripcion" => "Gastos de servicios que no están vinculados a una función concreta y que generalmente son de\ncometido de oficinas centrales a los diversos niveles del gobierno. También comprende los servicios\nvinculados a una determinada función que son de cometido de dichas oficinas centrales. Por ejemplo,\nse incluye aquí la recopilación de estadísticas de la industria, el medio ambiente, la salud o la\neducación por un organismo estadístico central.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "1.3.1.",
                "denominacion" => "Servicios generales de personal",
                "descripcion" => "Gastos de administración, regulación y gestión de los servicios generales de personal, inclusive la elaboración y aplicación de políticas y procedimientos generales de personal referentes a la\nselección, los ascensos, los métodos de calificación, la descripción, evaluación y clasificación de\nlas funciones, la administración de los reglamentos públicos y asuntos análogos.\nExcluye: administración y servicios de personal vinculados a una función concreta (clasificados\natendiendo a la función).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "1.3.2.",
                "denominacion" => "Servicios generales de planificación y estadística",
                "descripcion" => "Gastos de administración y funcionamiento de los servicios generales de planificación económica\ny social y de los servicios generales de estadística, inclusive la formulación, la coordinación y la\nsupervisión de los planes y programas económicos y sociales generales y los planes y programas\nestadísticos generales.\nExcluye: servicios de planificación económica y social y servicios estadísticos vinculados a una\nfunción concreta (clasificados atendiendo a la función).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "1.3.3.",
                "denominacion" => "Otros servicios generales",
                "descripcion" => "Gastos de administración y gestión de otros servicios generales como los servicios centralizados\nde suministros y adquisiciones, mantenimiento y almacenamiento de los expedientes y archivos\ngubernamentales, gestión de los edificios de propiedad estatal u ocupados por el gobierno\n(servicios generales de registro de bienes del Estado), parques centrales de automóviles,\nimprentas oficiales, servicios centralizados de computación y procesamiento de datos, etcétera.\nExcluye: otros servicios generales vinculados a una función concreta (clasificados atendiendo a la\nfunción).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "PTB",
                "codigo" => "743",
                "denominacion" => "Physikalisch Technische Bundesanstalt",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "-",
                "codigo" => "1.4.",
                "denominacion" => "Investigación básica",
                "descripcion" => "Gastos de trabajos experimentales o teóricos que se emprenden fundamentalmente para obtener\nnuevos conocimientos acerca de los fundamentos de fenómenos y hechos observables, sin pensar en\ndarles ninguna aplicación o utilización determinada. Se analizan propiedades, estructuras\nrelacionadas, con el objeto de formular y contrastar hipótesis, teorías y leyes.\nComprende donaciones, préstamos, transferencias o subsidios en apoyo a investigaciones básicas\nrealizadas por órganos no gubernamentales como institutos de investigación y universidades.\nExcluye: investigación aplicada y desarrollo experimental (clasificados atendiendo a las funciones)",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "1.5.",
                "denominacion" => "Investigación aplicada y desarrollo relacionados con los servicios públicos generales",
                "descripcion" => "Gastos de administración y gestión de organismos gubernamentales dedicados a investigación\naplicada y desarrollo experimental para adquirir nuevos conocimientos hacia un objetivo práctico\nespecífico relacionados con los servicios públicos generales\nExcluye: investigación básica (01.4.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "1.6.",
                "denominacion" => "Otros servicios públicos generales",
                "descripcion" => "Gastos de administración, gestión o apoyo de servicios públicos generales como inscripción de\nvotantes, celebración de elecciones y referendos, administración de territorios no autónomos o en\nfideicomiso, etcétera. Comprende acciones de conducción, administración, apoyo y otros como publicación de normas\noficiales, que por su generalidad no fueron factibles de clasificación en alguna función determinada\nde esta finalidad.\nExcluye: transacciones de la deuda pública (01.7); transferencias de carácter general entre diferentes\nniveles de gobierno (01.8).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "1.7.",
                "denominacion" => "Transacciones de la Deuda Pública",
                "descripcion" => "Gastos originados en las obligaciones que se desprenden de la deuda pública interna y externa, por\nconcepto de préstamos y emisión de títulos de deuda, incluye, comisiones y otros gastos.\nExcluye: gastos administrativos de la gestión de la deuda pública (01.1.2).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "1.8.",
                "denominacion" => "Transferencias de carácter general entre diferentes niveles de gobierno",
                "descripcion" => "Transferencias entre diferentes niveles de gobierno que son de carácter general y no están\nasignadas a una función determinada.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "2.",
                "denominacion" => "DEFENSA",
                "descripcion" => "Gastos de la organización y administración de los programas de defensa nacional, civil, ayuda militar en\nel exterior, investigación y desarrollo relacionados con la defensa nacional.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "2.1.",
                "denominacion" => "Defensa militar",
                "descripcion" => "Gastos de administración de asuntos y servicios de la defensa militar: tierra, mar, aire y espacio;\ngestión de la ingeniería, transportes, comunicaciones, información, personal y otras fuerzas\ndefensivas no combatientes; gestión o apoyo de las fuerzas de la reserva y auxiliares vinculadas al\nsistema de la defensa.\nComprende oficinas de los agregados militares destacados en el extranjero; hospitales de campaña.\nSe clasificarán en esta función las transferencias otorgadas para los fines de defensa militar.\nExcluye: misiones de ayuda militar (02.3.0); hospitales de base (07.3); escuelas y academias militares\ncon planes de estudios análogos a los de las instituciones civiles aun cuando la asistencia a ellas esté\nlimitada al personal militar y sus familiares (09,1), (09.2), (09.3) o (09.4); planes de pensiones para el\npersonal militar (10.2).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "2.2.",
                "denominacion" => "Defensa civil",
                "descripcion" => "Administración de asuntos y servicios de la defensa civil; formulación de planes para imprevistos;\norganización de maniobras en que participen instituciones y poblaciones civiles.\nGestión o apoyo de las fuerzas de defensa civil.\nExcluye: servicios de protección civil (03.2.0); adquisición y almacenamiento de alimentos, equipos y\notros suministros para uso de emergencia en caso de desastres en tiempo de paz (10.9.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "2.3.",
                "denominacion" => "Ayuda militar al exterior",
                "descripcion" => "Administración de la ayuda militar y gestión de las misiones de ayuda militar acreditadas ante\ngobiernos extranjeros o agregados a organizaciones o alianzas militares internacionales. Ayuda militar en forma de donaciones (en efectivo o en especie), préstamos, (de cualquier tipo de\ninterés) prestamos de equipo; contribuciones a las fuerzas internacionales de mantenimiento de la\npaz, incluida la asignación de contingentes.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "2.4.",
                "denominacion" => "Investigación y desarrollo relacionados con la defensa",
                "descripcion" => "Las definiciones de investigación básica, investigación aplicada y desarrollo experimental figuran en\n(01.4.0) y (01.5.0).\nAdministración y gestión de organismos gubernamentales dedicados a investigación aplicada y\ndesarrollo experimental relacionados con la defensa.\nDonaciones, préstamos, transferencias o subsidios en apoyo a investigación aplicada y desarrollo\nexperimental relacionados con la defensa realizados por órganos no gubernamentales, como\ninstitutos de investigación y universidades.\nExcluye: investigación básica (01.4.0)",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "2.5.",
                "denominacion" => "Otros servicios de defensa",
                "descripcion" => "Administración, gestión y apoyo de actividades como formulación, administración, coordinación y\nvigilancia de políticas, planes, programas y presupuestos generales relacionados con la defensa;\npreparación y ejecución de legislación relacionada con la defensa; producción y difusión de\ninformación general, documentación técnica y estadísticas sobre defensa, registro internacional de\nbuques, etcétera, asuntos y servicios que por su generalidad no fueron factibles de clasificación en\nalguna función determinada de esta finalidad.\nExcluye: administración de asuntos de los excombatientes (10.2).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "3.",
                "denominacion" => "JUSTICIA, ORDEN PÚBLICO Y SEGURIDAD",
                "descripcion" => "Acciones de organización y administración de los programas de orden público y seguridad nacional\nrelacionados con los servicios de policía; servicios de protección contra incendios; tribunales de justicia;\njusticia plural; prisiones y de investigación y desarrollo relacionados con el orden público y la seguridad.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "3.1.",
                "denominacion" => "Servicios de policía",
                "descripcion" => "Gastos de administración de asuntos y servicios de policía, inclusive el registro de extranjeros, la\nexpedición de documentos de trabajo y viaje a inmigrantes, el mantenimiento del registro de\ndetenciones y de las estadísticas relativas a la labor policial, la reglamentación y el control del\ntránsito urbano y de carretera, el registro de licencias y de automotores, apoyo a la prevención del\ncontrabando.\nGestión de las fuerzas policiales regulares y auxiliares de policía, de puertos, fronteras,\nguardacostas y otras fuerzas especiales de policía sostenidas por las autoridades públicas; gestión\nde los laboratorios policíacos; gestión o apoyo de programas de adiestramiento policial.\nExcluye: Academias de policía que imparten una enseñanza general además del adiestramiento\npolicial (09.1), (09.2), (09.3) o (09.4).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "3.2",
                "denominacion" => "Servicios de protección contra incendios",
                "descripcion" => "Administración de los asuntos y servicios de lucha y prevención contra incendios, gestión de\ncompañías de bomberos regulares y auxiliares y de otros servicios de prevención y lucha contra incendios sostenidos por las autoridades públicas, gestión o apoyo de los programas de\nadiestramiento para la prevención y lucha contra incendios.\nComprende servicios de protección civil como rescate en montañas, evacuación de zonas\ninundadas, etcétera.\nExcluye: defensa civil (02.2.0); fuerzas especialmente adiestradas y equipadas para la lucha o la\nprevención contra incendios forestales (04.2.2).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "3.3",
                "denominacion" => "Tribunales de justicia y Justicia Plural",
                "descripcion" => "Administración, gestión y apoyo a la administración de justicia ordinaria y Tribunales de justicia\ncivil, penal, familiar, de sentencia, agroambiental, consejos y otros en materia de justicia. Ejecución\nde multas y arreglos jurídicos impuestos por los tribunales y la gestión de los servicios de libertad\nvigilada y libertad condicional. Representación y asesoramiento jurídico en nombre del gobierno o\nde otros cuando sean suministrados por el gobierno mediante el pago en efectivo o la prestación\nde servicios, Comprende tribunales de administración de justicia, defensor del pueblo, etc.\nExcluye, administración de prisiones (03.4.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "3.4",
                "denominacion" => "Prisiones",
                "descripcion" => "Administración, gestión o apoyo de prisiones y otros establecimientos destinados a la detención o\nrehabilitación de delincuentes, como granjas y talleres correccionales, reformatorios,\nestablecimientos para jóvenes delincuentes, manicomios para delincuentes alienados, etcétera.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "3.5",
                "denominacion" => "Investigación y desarrollo relacionados con el orden público y la seguridad",
                "descripcion" => "Las definiciones de investigación básica, investigación aplicada y desarrollo experimental figuran en\n(01.4) y (01.5).\nAdministración y gestión de organismos gubernamentales dedicados a investigación aplicada y\ndesarrollo experimental relacionados con el orden público y la seguridad.\nDonaciones, préstamos, transferencias o subsidios en apoyo a investigación aplicada y desarrollo\nexperimental relacionados con el orden público y la seguridad realizados por órganos no\ngubernamentales, como institutos de investigación y universidades.\nExcluye: investigación básica (01.4.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "3.6",
                "denominacion" => "Otros servicios de orden público y seguridad",
                "descripcion" => "Administración, gestión y apoyo de actividades tales como formulación, administración,\ncoordinación y vigilancia de políticas, planes, programas y presupuestos generales relacionados con\nel orden público y la seguridad; preparación y ejecución de legislación y normas para garantizar el\norden público y la seguridad.\nIncluye: asuntos y servicios de orden público y seguridad que no puedan asignarse a (03.1), (03.2),\n(03.3). (03.4) o (03.5).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.",
                "denominacion" => "ASUNTOS ECONÓMICOS",
                "descripcion" => "Gastos relacionados a la producción de bienes y servicios para el desarrollo económico, incluye fomento,\nregulación y control de la producción del sector privado y de los organismos estatales en los siguientes sectores: asuntos económicos, comerciales y laborales en general; agricultura, silvicultura, pesca y caza;\ncombustibles y energía; minería; manufacturas y construcción; transporte; otras industrias e investigación\ny desarrollo relacionados con asuntos económicos.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.1.",
                "denominacion" => "Asuntos económicos, comerciales y laborales en general",
                "descripcion" => "",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.1.1.",
                "denominacion" => "Asuntos económicos y comerciales en general",
                "descripcion" => "Administración, regulación, gestión y vigilancia de asuntos y servicios económicos y comerciales\nen general, inclusive asuntos comerciales exteriores en general; formulación y ejecución de\npolíticas económicas y comerciales generales; enlace entre las diferentes ramas del gobierno y\nentre éste y el comercio.\nReglamentación o apoyo de actividades económicas y comerciales generales tales como el\ncomercio de exportación e importación en su conjunto, mercados de productos básicos y de\nvalores de capital, controles generales de los ingresos, actividades de fomento del comercio en\ngeneral, reglamentación general de monopolios y otras restricciones al comercio y al acceso al\nmercado, etcétera, fomento y regulación de actividades relacionadas con el sector financiero y\nsupervisión de la banca y seguros.\nGestión o apoyo de instituciones que se ocupan de patentes, marcas comerciales, derechos de\nautor, inscripción de empresas, pronósticos meteorológicos, pesos y medidas, levantamientos\nhidrológicos, levantamientos geodésicos, etcétera.\nDonaciones, préstamos, transferencias o subsidios para fomentar políticas y programas económicos\ny comerciales generales.\nIncluye, educación y protección del consumidor.\nExcluye: asuntos económicos y comerciales de una determinada industria (clasificados en (04.2) a\n(04.7) según proceda.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.1.2.",
                "denominacion" => "Asuntos laborales generales",
                "descripcion" => "Administración de asuntos y servicios laborales generales; formulación y aplicación de políticas\nlaborales generales; supervisión y reglamentación de las condiciones de trabajo (jornada de\ntrabajo, salarios, seguridad, etcétera); enlace entre las diferentes ramas del gobierno y entre éste\ny las organizaciones industriales, empresariales y laborales generales.\nGestión o apoyo de programas o planes generales para facilitar la movilidad en el empleo, reducir\nla discriminación por motivo de sexo, raza, edad y de otra índole, reducir la tasa de desempleo en\nregiones deprimidas o subdesarrolladas, fomentar el empleo de grupos desfavorecidos u otros\ngrupos caracterizados por elevadas tasas de desempleo, etcétera; gestión de agencias de\ncolocaciones; gestión o apoyo de servicios de arbitraje y mediación.\nProducción y difusión de información general, documentación técnica y estadísticas sobre asuntos\ny servicios laborales generales.\nDonaciones, préstamos, transferencias o subsidios para fomentar políticas y programas laborales\ngenerales.\nExcluye: Asuntos laborales de una determinada industria (clasificados en (04.2) a (04.7) según proceda); prestación de protección social en forma de prestaciones en efectivo o en especie a\npersonas que están desempleadas (10.5.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.2.",
                "denominacion" => "Agricultura, silvicultura, pesca y caza, y pecuaria",
                "descripcion" => "",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.2.1.",
                "denominacion" => "Agricultura",
                "descripcion" => "Gastos relacionados a la promoción, regulación, control y administración de asuntos y servicios\nde agricultura; conservación, bonificación o expansión de tierras de labranza; reforma agraria y\ncolonización de tierras; supervisión y reglamentación del sector agrícola.\nConstrucción o gestión de sistemas de ordenación de crecidas, riego y avenamiento, inclusive\ndonaciones, préstamos o subsidios para la ejecución de esas obras.\nGestión o apoyo de programas o planes para estabilizar o mejorar los precios e ingresos del sector\nagrícola; gestión o apoyo de servicios de extensión, servicios de lucha contra las plagas, de\ninspección de las cosechas y de clasificación según la calidad.\nProducción y difusión de información general, documentación técnica y estadísticas sobre asuntos\ny servicios agrícolas.\nIndemnizaciones, donaciones, préstamos, transferencias o subsidios a los agricultores en relación\ncon actividades agrícolas, inclusive pagos para restringir o estimular la producción de\ndeterminados cultivos o para dejar tierras en barbecho.\nExcluye: Proyectos de desarrollo polivalentes (04.7.4).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.8.6.",
                "denominacion" => "Investigación y desarrollo relacionados con las comunicaciones",
                "descripcion" => "Gastos de administración y gestión de organismos gubernamentales dedicados a investigación\naplicada y desarrollo experimental relacionados con las comunicaciones.\nComprende donaciones, préstamos, transferencias o subsidios en apoyo a investigación aplicada\ny desarrollo experimental relacionados con las comunicaciones realizados por órganos no\ngubernamentales, como institutos de investigación y universidades.\nIncluye: Comercio de distribución, almacenamiento y depósito; hoteles y restaurantes; turismo, y\nproyectos de desarrollo polivalentes.\nExcluye: investigación básica (01.4.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "OT-BIL",
                "codigo" => "998",
                "denominacion" => "Otros Organismos Financiadores Bilaterales",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "-",
                "codigo" => "4.2.2.",
                "denominacion" => "Silvicultura",
                "descripcion" => "Gastos relacionados a la promoción, regulación, control y administración de asuntos y servicios\nforestales; conservación, ampliación y explotación racionalizada de reservas forestales;\nsupervisión y reglamentación de explotaciones forestales y concesión de licencias para la tala de\nárboles.\nGestión o apoyo de labores de reforestación, lucha contra las plagas y enfermedades, servicios de\nprevención y lucha contra los incendios de bosques y servicios de extensión a las empresas de\nexplotación forestal.\nProducción y difusión de información general, documentación técnica y estadísticas sobre asuntos\ny servicios forestales, productos forestales además de la madera.\nSe clasificarán en esta función las donaciones, préstamos o subsidios en apoyo a actividades\nforestales comerciales.\nIncluye: productos forestales además de madera.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.2.3.",
                "denominacion" => "Pesca y caza",
                "descripcion" => "Gastos relacionados a la promoción, regulación, control y administración de asuntos y servicios\nde pesca y caza que se realizan fuera de parques y reservas naturales; protección, propagación y\nexplotación racionalizada de poblaciones de peces y animales salvajes; supervisión y reglamentación de la pesca de agua dulce y lacustre, la piscicultura, la caza de animales salvajes y\nla concesión de licencias de pesca y de caza.\nGestión o apoyo de viveros de peces, servicios de extensión, actividades de repoblación o\nselección, etcétera.\nProducción y difusión de información general, documentación técnica y estadísticas sobre asuntos\ny servicios de pesca y caza.\nDonaciones, préstamos, transferencias o subsidios en apoyo a actividades de pesca y caza\ncomerciales, inclusive la construcción o explotación de viveros de peces.\nExcluye: regulación de la pesca costera y oceánica (03.1.0); administración, ordenación o apoyo\nde parques y reservas naturales (05.4.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.2.4.",
                "denominacion" => "Pecuaria",
                "descripcion" => "Gastos destinados a la actividad ganadera, comprende a bovino (vacas), equino (caballos), ovino\n(ovejas), porcino (cerdos), caprino (cabras). También incluyen dentro de la clasificación de ganado\na las actividades de avicultura (aves), cunicultura (conejos), apicultura (abejas) y los servicios\nveterinarios a los productores pecuarios.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.3.",
                "denominacion" => "Combustibles y energía",
                "descripcion" => "",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.3.1.",
                "denominacion" => "Carbón y otros combustibles minerales sólidos",
                "descripcion" => "Esta clase comprende carbón de todas las calidades, lignito y turba, sea cual fuere el método de\nextracción o beneficio y su conversión en otras formas de combustibles.\nGastos de promoción, regulación, control y administración de asuntos y servicios relacionados\ncon los combustibles minerales sólidos; conservación, descubrimiento, aprovechamiento y\nexplotación racionalizada de recursos de combustibles minerales sólidos; supervisión y reglamentación\nde la extracción, el procesamiento, la distribución y la utilización de combustibles\nminerales sólidos.\nProducción y difusión de información general, documentación técnica y estadísticas sobre asuntos\ny servicios relacionados con los combustibles minerales sólidos.\nDonaciones, préstamos o subsidios en apoyo a la industria de combustibles minerales sólidos y a\nla industria de fabricación de briquetas o gas.\nExcluye: asuntos relacionados con el transporte de combustibles minerales sólidos (clasificados\nen la clase pertinente del grupo 04.5).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.3.2.",
                "denominacion" => "Petróleo y gas natural",
                "descripcion" => "Esta clase comprende gas natural, gases licuados de petróleo y gases de refinería, petróleo\nprocedente de pozos u otras fuentes, como esquistos o arenas bituminosas, y la distribución\nurbana de gas, sea cual fuere su composición.\nGastos inherentes a la promoción, regulación, control y administración de asuntos y servicios\nrelacionados con el petróleo y el gas natural; conservación, descubrimiento, aprovechamiento y explotación racionalizada de recursos de petróleo y gas natural; supervisión y reglamentación de\nla extracción, procesamiento, distribución y utilización de petróleo y gas natural.\nProducción y difusión de información general, documentación técnica y estadísticas sobre asuntos\ny servicios relacionados con el petróleo y el gas natural.\nComprende donaciones, préstamos, transferencias o subsidios en apoyo a la industria de\nextracción del petróleo y a la industria de refinación del petróleo crudo y de los productos líquidos\ny gaseosos conexos.\nExcluye: asuntos relacionados con el transporte de petróleo o gas (clasificados en la sub función\npertinente del grupo 04.5).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.3.3.",
                "denominacion" => "Combustibles nucleares",
                "descripcion" => "Gastos relacionados a la promoción, regulación, control y administración de asuntos y servicios\nrelacionados con los combustibles nucleares; conservación, descubrimiento, aprovechamiento y\nexplotación racionalizada de recursos de materiales nucleares; supervisión y reglamentación de\nla extracción y el procesamiento de materiales de combustible nuclear y de la fabricación,\ndistribución y utilización de elementos de combustible nuclear.\nProducción y difusión de información general, documentación técnica y estadísticas sobre asuntos\ny servicios relacionados con los combustibles nucleares.\nDonaciones, préstamos, transferencias o subsidios en apoyo a la industria de extracción de materiales\nnucleares y las industrias que procesan dichos materiales.\nExcluye: asuntos relacionados con el transporte de combustible nuclear (clasificados en la clase\npertinente del grupo 04.5); eliminación de desechos radiactivos (05.1.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.3.4.",
                "denominacion" => "Otros combustibles",
                "descripcion" => "Gastos de administración de asuntos y servicios que conciernen a combustibles como el alcohol,\nla madera y sus desechos, el bagazo y otros combustibles no comerciales.\nProducción y difusión de información general, documentación técnica y estadísticas sobre\ndisponibilidad, producción y utilización de esos combustibles.\nComprende donaciones, préstamos, transferencias o subsidios para fomentar la utilización de\ndichos combustibles para la producción de energía.\nExcluye: ordenación de bosques (04.2.2); energía eólica y solar (04.3.5) o (04.3.6); recursos\ngeotérmicos (04.3.6).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.3.5.",
                "denominacion" => "Electricidad",
                "descripcion" => "Esta clase comprende fuentes tradicionales de electricidad como fuentes termoeléctricas o\nhidroeléctricas, y fuentes más nuevas como generadores eólicos o solares.\nGastos relacionados a la promoción, regulación, control y administración de asuntos y servicios\nrelacionados con la electricidad; conservación, aprovechamiento y explotación racionalizada de\nfuentes de electricidad; supervisión y reglamentación de la generación, transmisión y distribución\nde electricidad. Construcción o explotación de sistemas de abastecimiento de electricidad diferentes de las\nempresas.\nProducción y difusión de información general, documentación técnica y estadísticas sobre asuntos\ny servicios relacionados con la electricidad.\nDonaciones, préstamos, transferencias o subsidios en apoyo a la industria de producción de\nelectricidad, incluidos desembolsos para la construcción de presas y otras obras destinadas\nprincipalmente a la generación de electricidad.\nExcluye: energía no eléctrica producida por generadores eólicos o solares (04.3.6).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "7.7.",
                "denominacion" => "Desarrollo humano relacionado a la Salud",
                "descripcion" => "Comprende gastos destinados a mejorar cualitativamente el desarrollo humano mediante programas\nde apoyo social con la finalidad de disminuir la mortalidad de las mujeres gestantes y la desnutrición\ncrónica de niños y niñas menores de dos años; incluye gastos administrativos.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "JUS",
                "codigo" => "23 1",
                "denominacion" => "JUSTICIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "-",
                "codigo" => "4.3.6.",
                "denominacion" => "Energía no eléctrica",
                "descripcion" => "Gastos relacionados a la promoción, regulación, control y administración de asuntos y servicios\nde la energía no eléctrica que se refieren principalmente a la producción, distribución y utilización\nde calor en forma de vapor y agua o aire calientes.\nConstrucción o explotación de sistemas que suministran energía no eléctrica diferente de las\nempresas.\nProducción y difusión de información general, documentación técnica y estadísticas sobre\ndisponibilidad, producción y utilización de energía no eléctrica.\nDonaciones, préstamos, transferencias o subsidios para fomentar la utilización de energía no\neléctrica y recursos geotérmicos; energía no eléctrica producida por generadores eólicos o solares.\nIncluye: recursos geotérmicos; energía no eléctrica producida por generadores eólicos o solares.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.4.",
                "denominacion" => "Minería, manufacturas y construcción",
                "descripcion" => "",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.4.1.",
                "denominacion" => "Extracción de recursos minerales excepto los combustibles minerales",
                "descripcion" => "Esta clase comprende minerales metalíferos, arena, arcilla, piedra, minerales para la fabricación\nde productos químicos y fertilizantes, sal, piedras preciosas, amianto, yeso, etc.\nGastos relacionados a la promoción, regulación, control y administración de asuntos y servicios\nrelacionados con la minería y los recursos minerales (salmueras); conservación, descubrimiento,\naprovechamiento y explotación racionalizada de recursos minerales; supervisión y\nreglamentación de la prospección, la extracción, la comercialización y otros aspectos de la\nproducción de minerales.\nProducción y difusión de información general, documentación técnica y estadísticas sobre asuntos\ny servicios relacionados con la minería y los recursos minerales.\nDonaciones, préstamos, transferencias o subsidios en apoyo a actividades comerciales de extracción\nminera y concesión de licencias y arriendos, reglamentación de las tasas de producción,\ninspección de minas para verificar el cumplimiento de los reglamentos de seguridad, etcétera.\nIncluye: Inspección de las plantas fabriles para verificar el cumplimiento de los reglamentos de\nseguridad, protección de los consumidores contra productos peligrosos, etc. Excluye: carbón y otros combustibles sólidos (04.3.1), petróleo y gas natural (04.3.2) y materiales\nde combustible nuclear (04.3.3).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.4.2.",
                "denominacion" => "Manufacturas",
                "descripcion" => "Gastos inherentes a la promoción, regulación, control y administración de asuntos y servicios de\nmanufacturas; desarrollo, ampliación o mejoramiento de las manufacturas; supervisión y\nreglamentación del establecimiento y funcionamiento de plantas fabriles; enlace con asociaciones\nde fabricantes y otras organizaciones interesadas en asuntos y servicios de manufacturas.\nProducción y difusión de información general, documentación técnica y estadísticas sobre\nactividades manufactureras y productos manufacturados.\nDonaciones, préstamos, transferencias o subsidios en apoyo a empresas manufactureras e\ninspección de las plantas fabriles para verificar el cumplimiento de los reglamentos de seguridad,\nprotección de los consumidores contra productos peligrosos, etcétera.\nExcluye: asuntos y servicios relacionados con la industria de elaboración del carbón (04.3.1), la\nindustria de refinación del petróleo (04.3.2) o la industria de los combustibles nucleares (04.3.3).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.4.3.",
                "denominacion" => "Construcción",
                "descripcion" => "Gastos de promoción, regulación, control y administración de asuntos y servicios de la\nconstrucción; supervisión de la industria de la construcción; elaboración y aplicación de normas\nde la construcción.\nProducción y difusión de información general, documentación técnica y estadísticas sobre asuntos\ny servicios de la construcción.\nIncluye: concesión de certificados de habilitación; inspección de las obras en construcción para\nverificar el cumplimiento de los reglamentos de seguridad, etcétera.\nExcluye: donaciones, préstamos y subsidios para la construcción de viviendas, fábricas, servicios\npúblicos, establecimientos culturales, etc. (clasificados atendiendo a la función); elaboración y\naplicación de normas sobre viviendas (06.1.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.5.",
                "denominacion" => "Transporte",
                "descripcion" => "",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.5.1.",
                "denominacion" => "Transporte por carretera",
                "descripcion" => "Gastos relacionados a la promoción, regulación, control y administración de asuntos y servicios\nrelacionados con la explotación, la utilización, la construcción y el mantenimiento de sistemas e\ninstalaciones de transporte por carretera (caminos, puentes, túneles, parques de\nestacionamiento, terminales de autobuses, etcétera).\nSupervisión y reglamentación de los usuarios de las carreteras (concesión de licencias para\nvehículos y conductores, inspección de la seguridad de los vehículos, especificaciones de tamaño\ny carga para el transporte de pasajeros y mercancías por carretera, reglamentación de las horas\nde trabajo de los conductores de autobuses, autocares y camiones, etcétera), del funcionamiento\ndel sistema de transporte por carretera (concesión de franquicias, aprobación de tarifas de\npasajeros y de carga, horas y frecuencias de los servicios, etcétera) y de la construcción y el\nmantenimiento de carreteras.\nConstrucción o explotación de sistemas e instalaciones de transporte por carretera diferentes de\nlas empresas.\nProducción y difusión de información general, documentación técnica y estadísticas sobre el\nfuncionamiento del sistema de transporte por carretera y sobre actividades de construcción de\ncarreteras.\nDonaciones, préstamos, transferencias o subsidios en apoyo a la explotación, la construcción, el\nmantenimiento o el mejoramiento de los sistemas e instalaciones de transporte por carretera.\nIncluye, carreteras, caminos urbanos y vecinales, calles, senderos para bicicletas y aceras.\nExcluye: control del tránsito por carretera (03.1.0); donaciones, préstamos o subsidios a los\nfabricantes de vehículos de carretera (04.4.2); limpieza de calles (05.1.0); construcción de\nterraplenes de contención de ruido, setos y otros medios de lucha contra el ruido, inclusive la\nrepavimentación de secciones de carreteras urbanas con superficies reductoras del ruido (05.3.0);\nalumbrado público (06.4.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.5.2.",
                "denominacion" => "Transporte por agua",
                "descripcion" => "Gastos relacionados a la promoción, regulación, control y administración de asuntos y servicios\nrelacionados con la explotación, la utilización, la construcción y el mantenimiento de sistemas y\nservicios de transporte por vías de navegación interior y costeras y por mar (puertos, espigones,\nayudas y equipo para la navegación, canales artificiales y naturales, puentes, túneles, rompeolas,\nmalecones, muelles, terminales, etcétera).\nSupervisión y reglamentación de los usuarios del transporte por agua (matrículas, concesión de\nlicencias e inspecciones de buques y tripulaciones, reglamentaciones relativas a la seguridad de\npasajeros y mercaderías, etcétera), del funcionamiento del sistema de transporte por agua\n(concesión de franquicias, aprobación de tarifas de pasajeros y de carga, horas y frecuencias de\nlos servicios, etcétera) y de la construcción y el mantenimiento de los servicios de transporte por\nagua.\nConstrucción o explotación de sistemas e instalaciones de transporte por agua diferentes de las\nempresas (como barcazas de trasbordo).\nProducción y difusión de información general, documentación técnica y estadísticas sobre el\nfuncionamiento del sistema de transporte por agua y las actividades de construcción de\ninstalaciones de transporte por agua.\nDonaciones, préstamos, transferencias o subsidios en apoyo a la explotación, la construcción, el\nmantenimiento o el mejoramiento de los sistemas e instalaciones de transporte por agua; incluye,\nayudas a la navegación por radio y satélite; servicios de rescate de emergencia y remolque.\nExcluye: donaciones, préstamos y subsidios a los astilleros (04.4.2).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.9.",
                "denominacion" => "Otros asuntos económicos",
                "descripcion" => "Gastos de administración, gestión o apoyo de actividades relacionadas con asuntos económicos\ngenerales y sectoriales que por su generalidad no fueron factibles de asignarse en alguna función\ndeterminada de esta finalidad.\nIncluye: servicios de aerofotogrametría, hidrografía naval, geodésico de mapas, investigación de\nciencias y tecnologías avanzadas (nuclear) desarrollo de las macroregiones y zonas fronterizas.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "FAE",
                "codigo" => "382",
                "denominacion" => "Fondo de Ayuda al Equipamiento (España)",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "GOB.EXT",
                "codigo" => "0",
                "denominacion" => "Gobiernos Extranjeros",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "-",
                "codigo" => "4.5.3.",
                "denominacion" => "Transporte por ferrocarril",
                "descripcion" => "Gastos relacionados a la promoción, regulación, control y administración de asuntos y servicios\nrelacionados con la explotación, la utilización, la construcción o el mantenimiento de sistemas e\ninstalaciones de transporte por ferrocarril (firmes de las vías férreas, terminales, túneles, puentes, terraplenes, desmontes, etcétera).\nSupervisión y reglamentación de tos usuarios de los ferrocarriles (condiciones del material\nrodante, estabilidad del firme de las vías, seguridad de los pasajeros y de la carga, etcétera), del\nfuncionamiento de sistema de transporte por ferrocarril (concesión de franquicias, aprobación de\ntarifas de pasajeros y de carga, horas y frecuencias de los servicios, etcétera) y la construcción y\nel mantenimiento de los ferrocarriles.\nExplotación de sistemas e instalaciones de transporte ferroviario diferentes de las empresas.\nProducción y difusión de información general, documentación técnica y estadísticas sobre el\nfuncionamiento del sistema de transporte ferroviario y sobre actividades de construcción de\nferrocarriles.\nDonaciones, préstamos, transferencias o subsidios en apoyo a la explotación, la construcción, el\nmantenimiento o el mejoramiento de los sistemas e instalaciones de transporte ferroviario;\nincluye sistemas de transporte ferroviario de grandes vías y servicios interurbanos, sistemas de\ntránsito ferroviario urbano rápido, sistemas de transporte por tranvía; adquisición y\nmantenimiento de material rodante.\nExcluye: donaciones, préstamos o subsidios a fabricantes de material rodante (04.4.2);\nconstrucción de terraplenes de contención de ruido, setos y otros medios de lucha contra el ruido,\nincluida la renovación de secciones de vías férreas con superficies reductoras del ruido (05.3.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.5.4.",
                "denominacion" => "Transporte aéreo",
                "descripcion" => "Gastos relacionados a la promoción, regulación, control y administración de asuntos y servicios\nrelacionados con la explotación, la utilización, la construcción y el mantenimiento de sistemas e\ninstalaciones de transporte aéreo (aeropuertos, pistas de aterrizaje, terminales, hangares, ayudas\ny equipo para la navegación, instalaciones de control de tránsito aéreo, etcétera).\nSupervisión y reglamentación de los usuarios del transporte aéreo (matrículas, licencias e\ninspección de aviones, pilotos, tripulaciones, personal de tierra, reglamentaciones relativas a la\nseguridad de los pasajeros, investigación de accidentes del transporte aéreo, etcétera), del\nfuncionamiento del sistema de transporte aéreo (asignación de rutas, aprobación de tarifas de\npasajeros y de carga, frecuencia y niveles del servicio, etcétera) y la construcción y mantenimiento\nde instalaciones de transporte aéreo.\nConstrucción o explotación de servicios e instalaciones de transporte aéreo público diferentes de\nlas empresas.\nProducción y difusión de información general, documentación técnica y estadísticas sobre el\nfuncionamiento del sistema de transporte aéreo y sobre construcción de instalaciones de\ntransporte aéreo.\nDonaciones, préstamos, transferencias o subsidios en apoyo a la explotación, la construcción, el\nmantenimiento o el mejoramiento de sistemas e instalaciones de transporte aéreo, incluye,\nayudas a la navegación por radio y satélite; servicios de rescate de emergencia; servicios de carga\ny pasajeros, regulares o no; reglamentación y control de vuelos de particulares.\nExcluye: donaciones, préstamos y subsidios a fabricantes de aviones (04.4.2).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.5.5.",
                "denominacion" => "Transporte por oleoductos y gasoductos y otros sistemas de transporte",
                "descripcion" => "Gastos inherentes a la promoción, regulación, control y administración de asuntos y servicios\nrelacionados con la explotación, la utilización, la construcción y el mantenimiento de sistemas de\ntransporte por oleoductos y gasoductos y otros sistemas de transporte (funiculares, teleféricos,\ntelesillas, etcétera).\nSupervisión y reglamentación de los usuarios de los sistemas de transporte por oleoductos y\ngasoductos y otros sistemas de transporte (registro, concesión de licencias, inspección de equipo,\nespecialización y capacitación de operadores, normas de seguridad, etcétera); del funcionamiento\nde los sistemas de transporte por oleoductos y gasoductos y otros sistemas de transporte\n(concesión de franquicias, fijación de tarifas, frecuencia y niveles del servicio, etcétera) y de\nconstrucción y mantenimiento de sistemas de transporte por oleoductos y gasoductos y otros\nsistemas de transporte.\nConstrucción o explotación de sistemas de transporte por oleoductos y gasoductos y otros\nsistemas de transporte diferentes de las empresas.\nProducción y difusión de información general, documentación técnica y estadísticas sobre el\nfuncionamiento y la construcción de sistemas de transporte por oleoductos y gasoductos y otros\nsistemas de transporte.\nDonaciones, préstamos, transferencias o subsidios en apoyo a la explotación, la construcción, el\nmantenimiento o el mejoramiento de sistemas de transporte por oleoductos y gasoductos y otros\nsistemas de transporte.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.6.",
                "denominacion" => "Comunicaciones",
                "descripcion" => "Gastos relacionados a la promoción, regulación, control y administración de asuntos y servicios\nrelacionados con la construcción, la ampliación, el mejoramiento, la explotación y el\nmantenimiento de sistemas de comunicaciones (sistemas de comunicación postal, telefónica,\ntelegráfica, digital, inalámbrica y por satélite).\nReglamentación del funcionamiento de los sistemas de comunicaciones (concesión de franquicias,\nasignación de frecuencias, especificación de los mercados a los que se ha de prestar servicios y de\nlas tarifas, etcétera).\nProducción y difusión de información general, documentación técnica y estadísticas sobre asuntos\ny servicios relacionados con las comunicaciones.\nDonaciones, préstamos, transferencias o subsidios en apoyo a la construcción, la explotación, el\nmantenimiento o el mejoramiento de sistemas de comunicaciones.\nExcluye: Ayudas a la navegación por radio y satélite para el transporte por agua (04.5.2) y el\ntransporte aéreo (04.5.4); sistemas de transmisión por radio y televisión (08.3.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.7.",
                "denominacion" => "Otras industrias",
                "descripcion" => "",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "5.",
                "denominacion" => "PROTECCIÓN DEL MEDIO AMBIENTE",
                "descripcion" => "Gastos dirigidos a crear los mecanismos para la regulación de las actividades sobre el medio ambiente y\nlos recursos naturales.\nComprende la recogida, el tratamiento y eliminación de los desechos; gestión del sistema de alcantarillado\ny el tratamiento de las aguas residuales, protección del aire ambiente y del clima, la protección del suelo\ny de las aguas subterráneas, la reducción de los ruidos y las vibraciones y la protección contra la radiación;\nprotección de la fauna y la flora, protección de determinados hábitat y la protección de paisajes por sus\nvalores estéticos.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "7.2.",
                "denominacion" => "Servicios para pacientes externos",
                "descripcion" => "Gastos relacionados a los servicios médicos, dentales y paramédicos prestados por médicos, dentistas,\nparamédicos y auxiliares a pacientes que acuden a consultas externas. Los servicios pueden prestarse\nen casa, en consultorios individuales o en consultorios colectivos, en dispensarios o ambulatorios de\nhospitales o en otros centros semejantes; incluyen, los medicamentos, las prótesis, los aparatos y\nequipos médicos y otros productos relacionados con la salud proporcionados directamente a los\npacientes que acuden a las consultas externas por los médicos, dentistas, paramédicos y auxiliares\nmédicos.\nLos servicios médicos, dentales y paramédicos que proporcionan los hospitales y otros proveedores a\nlos pacientes ingresados quedan incluidos en servicios hospitalarios (07.3).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "TAR",
                "codigo" => "6",
                "denominacion" => "TARIJA",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "-",
                "codigo" => "4.7.1.",
                "denominacion" => "Comercio de distribución, almacenamiento y depósito",
                "descripcion" => "Gastos de promoción, regulación, control y administración de asuntos y servicios relacionados con el comercio de distribución y la industria de almacenamiento y depósito.\nSupervisión y reglamentación del comercio al por mayor y al por menor (concesión de licencias,\nprácticas de venta, rotulación de alimentos envasados y otras mercaderías destinadas al consumo\ndoméstico, inspección de balanzas y otras máquinas de pesar, etcétera) y de la industria de\nalmacenamiento y depósito (inclusive concesión de licencias y reglamentación de almacenes\naduaneros públicos, etcétera).\nAdministración de planes de control de precios y de racionamiento aplicados por conducto de los\nminoristas o mayoristas, sea cual fuere el tipo de mercaderías de que se trate o el consumidor al\nque se destine; administración y prestación de subsidios alimentarios y de otro tipo al público en\ngeneral.\nProducción y difusión de información a los comerciantes y al público sobre precios, sobre la\ndisponibilidad de mercaderías y sobre otros aspectos del comercio de distribución y de la industria\nde almacenamiento y depósito; recopilación y publicación de estadísticas sobre el comercio de\ndistribución y la industria de almacenamiento y depósito.\nDonaciones, préstamos, transferencias o subsidios en apoyo al comercio de distribución y la industria\nde almacenamiento y depósito.\nExcluye: administración de controles de precios y de otro tipo aplicados al productor (clasificados\natendiendo a la función); subsidios a los alimentos y de otro tipo aplicables a determinados grupos\nde la población o personas (10).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.7.2.",
                "denominacion" => "Hoteles y restaurantes",
                "descripcion" => "Gastos de promoción, regulación, control y administración de asuntos y servicios relativos a la\nconstrucción, la ampliación, el mejoramiento, la explotación y el mantenimiento de hoteles y\nrestaurantes.\nSupervisión y reglamentación de la explotación de hoteles y restaurantes (reglamentaciones de\nprecios, normas de limpieza y prácticas de venta, concesión de licencias para hoteles y\nrestaurantes, etcétera).\nProducción y difusión de información general, documentación técnica y estadísticas sobre asuntos\ny servicios de hoteles y restaurantes.\nDonaciones, préstamos, transferencias o subsidios en apoyo a la construcción, la explotación, el\nmantenimiento o el mejoramiento de hoteles y restaurantes.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.7.3.",
                "denominacion" => "Turismo",
                "descripcion" => "Gastos relacionados a la promoción, regulación, control y administración de asuntos y servicios\nde turismo; fomento y desarrollo del turismo; enlace con las industrias del transporte, los hoteles\ny los restaurantes y otras industrias que se benefician con la presencia de turistas.\nExplotación de oficinas de turismo en el país y en el exterior; organización de campañas\npublicitarias, inclusive la producción y difusión de literatura de promoción, etcétera; recopilación\ny publicación de estadísticas sobre turismo.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.7.4.",
                "denominacion" => "Proyectos de desarrollo polivalentes",
                "descripcion" => "Los proyectos de desarrollo polivalentes en un caso típico, consisten en servicios integrados para\nla generación de energía, la ordenación de las crecidas, el riego, la navegación y el esparcimiento.\nGastos de administración de asuntos y servicios relativos a la construcción, la ampliación, el\nmejoramiento, la explotación y el mantenimiento de proyectos polivalentes.\nProducción y difusión de información general, documentación técnica y estadísticas sobre asuntos\ny servicios de proyectos de desarrollo polivalentes.\nComprende donaciones, préstamos, apoyo a la construcción, la explotación, el mantenimiento o\nel mejoramiento de proyectos de desarrollo polivalentes.\nExcluye: proyectos con una función principal y otras funciones que son secundarias (clasificados\natendiendo a la función principal).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.7.5.",
                "denominacion" => "Otras",
                "descripcion" => "Gastos relacionados con la industria que por su generalidad no fueron factibles de asignarse en\nalguna función determinada de esta finalidad.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.8.",
                "denominacion" => "Investigación y desarrollo relacionados con asuntos económicos",
                "descripcion" => "Las definiciones de investigación básica, investigación aplicada y desarrollo experimental figuran en\n(01.4) y (01.5).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.8.1.",
                "denominacion" => "Investigación y desarrollo relacionados con asuntos económicos, comerciales y laborales en\ngeneral",
                "descripcion" => "Gastos de administración y gestión de organismos gubernamentales dedicados a investigación\naplicada y desarrollo experimental relacionados con asuntos económicos, comerciales y laborales\nen general.\nComprende donaciones, préstamos, transferencias o subsidios en apoyo a investigación aplicada\ny desarrollo experimental relacionados con asuntos económicos, comerciales y laborales en\ngeneral realizados por órganos no gubernamentales, como institutos de investigación y\nuniversidades.\nExcluye: investigación básica (01.4.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.8.2.",
                "denominacion" => "Investigación y desarrollo relacionados con agricultura, silvicultura, pesca y caza",
                "descripcion" => "Gastos de administración y gestión de organismos gubernamentales dedicados a investigación\naplicada y desarrollo experimental relacionados con agricultura, silvicultura, pesca y caza. Incluye:\nAdministración y gestión de tierras y territorio, desarrollo de los pueblos indígenas, originarios y\ncomunidades campesinas.\nComprende donaciones, préstamos, transferencias o subsidios en apoyo a investigación aplicada\ny desarrollo experimental relacionados con agricultura, silvicultura, pesca y caza realizados por\nórganos no gubernamentales como institutos de investigación y universidades.\nExcluye: investigación básica (01.4.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.8.3.",
                "denominacion" => "Investigación y desarrollo relacionados con combustibles y energía",
                "descripcion" => "Administración y gestión de organismos gubernamentales dedicados a investigación aplicada y\ndesarrollo experimental relacionados con combustibles y energía.\nDonaciones, préstamos, transferencias o subsidios en apoyo a investigación aplicada y desarrollo\nexperimental relacionados con combustibles y energía realizados por órganos no\ngubernamentales, como institutos de investigación y universidades.\nExcluye: investigación básica (01.4.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.8.4.",
                "denominacion" => "Investigación y desarrollo relacionados con minería, manufacturas y construcción",
                "descripcion" => "Gastos de administración y gestión de organismos gubernamentales dedicados a investigación\naplicada y desarrollo experimental relacionados con minería, manufacturas y construcción.\nDonaciones, préstamos, transferencias o subsidios en apoyo a investigación aplicada y desarrollo\nexperimental relacionados con minería, manufacturas y construcción realizados por órganos no\ngubernamentales, como institutos de investigación y universidades.\nExcluye: investigación básica (01.4.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "4.8.5.",
                "denominacion" => "Investigación y desarrollo relacionados con el transporte",
                "descripcion" => "Gastos de administración y gestión de organismos gubernamentales dedicados a investigación\naplicada y desarrollo experimental relacionados con el transporte.\nComprende donaciones, préstamos, transferencias o subsidios en apoyo a investigación aplicada\ny desarrollo experimental relacionados con el transporte realizados por órganos no gubernamentales,\ncomo institutos de investigación y universidades.\nExcluye: investigación básica (01.4.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "FIDAB",
                "codigo" => "383",
                "denominacion" => "Fondo de Integración y Desarrollo Bolivia-Argentina",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "EXIMBANK-J",
                "codigo" => "417",
                "denominacion" => "Banco de Importaciones - Exportaciones Japón",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "ALEM",
                "codigo" => "541",
                "denominacion" => "República Federal de Alemania",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "-",
                "codigo" => "5.1.",
                "denominacion" => "Ordenación de desechos",
                "descripcion" => "Gastos de regulación, administración, supervisión, inspección, gestión o apoyo de los sistemas de recogida,\ntratamiento y eliminación de desechos. Esta función incluye la recogida, el tratamiento y la\neliminación de los desechos, el barrido de calles, plazas, vías, mercados, jardines públicos, parques,\netc.; la recogida de todo tipo de desechos, con independencia de que se haga de manera selectiva,\nsegún el tipo de producto, o de que cubra indistintamente todo tipo de desechos, y su transporte al\nlugar de tratamiento o vertimiento.\nEl tratamiento de desechos incluye cualquier método o proceso destinado a modificar las\ncaracterísticas o composición física, química o biológica de cualquier desecho para neutralizarlo,\neliminar de él cualquier sustancia peligrosa, volverlo más seguro para el transporte, hacer posible su\nrecuperación o almacenaje o reducir su volumen.\nLa eliminación de desechos consiste, entre otras cosas, en proporcionar un destino final a los desechos\nque ya no resultan útiles, mediante el uso de vertederos, el confinamiento, el enterramiento, el\nvertimiento en el mar o cualquier otro método pertinente de eliminación.\nComprende donaciones, préstamos, transferencias o subsidios en apoyo de la explotación, la\nconstrucción, el mantenimiento o la mejora de estos sistemas; incluye, la recogida, el tratamiento y\nla eliminación de los desechos nucleares.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "5.2.",
                "denominacion" => "Ordenación de aguas residuales",
                "descripcion" => "Gastos de regulación, administración, supervisión, inspección, explotación o apoyo de los sistemas de\nalcantarillado y del tratamiento de las aguas residuales. La gestión del sistema de alcantarillado\nincluye la explotación y la construcción del sistema de colectores, tuberías, conductos y bombas de\nevacuación de las aguas residuales (agua de lluvia y aguas residuales domésticas y de otro tipo) desde\nlos puntos de generación hasta una instalación de tratamiento de aguas residuales o un lugar desde\nel cual se viertan las aguas residuales a las aguas superficiales.\nEl tratamiento de las aguas residuales incluye cualquier proceso mecánico, biológico o avanzado de\npurificación de las aguas residuales con el fin de que estas cumplan las normas medioambientales\nvigentes y otras normas de calidad.\nDonaciones, préstamos, transferencias o subsidios en apoyo a la explotación, la construcción, el\nmantenimiento o el mejoramiento de estos sistemas.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "5.3.",
                "denominacion" => "Reducción de la contaminación",
                "descripcion" => "Gastos de regulación, administración, supervisión, inspección, gestión o apoyo de actividades relacionadas\ncon la reducción y el control de la contaminación, relacionadas con la protección del aire\nambiente y del clima, la protección del suelo y de las aguas subterráneas, la reducción de los ruidos y\nlas vibraciones y la protección contra la radiación.\nEntre estas actividades figuran la construcción, el mantenimiento y la explotación de sistemas y\nestaciones de vigilancia (aparte de las estaciones meteorológicas); la colocación de terraplenes de\ncontención de ruido, setos y otros medios de lucha contra el ruido, así como la renovación de algunas\nsecciones de las carreteras urbanas o de los ferrocarriles con revestimientos que reduzcan los ruidos;\nmedidas de reducción de la contaminación en las extensiones de agua; medidas de ordenación y\nprevención de las emisiones de gases termoactivos y contaminantes que afectan desfavorablemente\na la calidad del aire; la construcción, el mantenimiento y la explotación de instalaciones de\ndescontaminación de suelos contaminados y de almacenamiento de productos contaminantes; el\ntransporte de productos contaminantes.\nComprende donaciones, préstamos, transferencias o subsidios en apoyo de actividades relacionadas\ncon la reducción y el control de la contaminación.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "5.4.",
                "denominacion" => "Protección de la diversidad biológica y del paisaje",
                "descripcion" => "Gastos de regulación, administración, supervisión, inspección, gestión o apoyo de actividades relacionadas\ncon la protección de la diversidad biológica y del paisaje, relacionadas con la protección de\nla fauna y la flora (tales como, por ejemplo, la re introducción de especies extinguidas y la recuperación\nde especies en peligro de extinción), la protección de determinados habitáis (inclusive la\nordenación de parques y de reservas naturales) y la protección de paisajes por sus valores estéticos\n(por ejemplo, la reparación de paisajes deteriorados con fines de fortalecer su valor estético y la\nrehabilitación de minas y canteras abandonadas).\nDonaciones, préstamos, transferencias o subsidios en apoyo a actividades relacionadas con la\nprotección de la diversidad biológica y del paisaje.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "5.5.",
                "denominacion" => "Investigación y desarrollo relacionados con la protección del medio ambiente",
                "descripcion" => "Gastos de administración y gestión de organismos gubernamentales dedicados a investigación\naplicada y desarrollo experimental relacionados con la protección del medio ambiente.\nComprende donaciones, préstamos, transferencias o subsidios en apoyo a investigación aplicada y\ndesarrollo experimental relacionados con la protección del medio ambiente, hechos por organismos\nno gubernamentales, como institutos de investigación y universidades.\nExcluye: investigación básica (01.4.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "5.6.",
                "denominacion" => "Otros servicios de protección del medio ambiente",
                "descripcion" => "Gastos de administración, dirección, regulación, supervisión, gestión y apoyo de actividades como\nformulación, administración, coordinación y vigilancia de políticas, planes, programas y presupuestos\ngenerales para promover la protección del medio ambiente; preparación y ejecución de legislación y\nnormas de actuación en lo referente a la prestación de servicios de protección del medio ambiente;\nproducción y difusión de información general, documentación técnica y estadísticas sobre la\nprotección del medio ambiente, que por su generalidad no fueron factibles de asignarse en alguna\nfunción determinada de esta finalidad.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "6.",
                "denominacion" => "VIVIENDA Y SERVICIOS COMUNITARIOS",
                "descripcion" => "Acciones de regulación y promoción del desarrollo habitacional con el fin de posibilitar a los integrantes\nde la comunidad el acceso a unidades de vivienda; acciones destinadas a procurar el desarrollo de\nservicios comunitarios y básicos que mejoren la calidad de vida de la población; abastecimiento de agua;\nalumbrado público e investigación y desarrollo relacionados con esta función.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "6.1.",
                "denominacion" => "Urbanización",
                "descripcion" => "Administración de asuntos y servicios relacionados con la urbanización; regulación, promoción,\nvigilancia y evaluación de las actividades de urbanización, independientemente de que éstas estén o\nno patrocinadas por las autoridades públicas; elaboración y regulación de normas de urbanización.\nEliminación de tugurios relacionada con la creación de viviendas; adquisición de terrenos necesarios\npara la construcción de viviendas; construcción o adquisición y remodelación de unidades de vivienda\npara el público en general o para personas con necesidades especiales.\nProducción y difusión de información general, documentación técnica y estadísticas sobre asuntos y\nservicios relacionados con la urbanización.\nDonaciones, préstamos o subsidios en apoyo de la expansión, el mejoramiento o el mantenimiento\ndel patrimonio de viviendas.\nExcluye: la creación y regulación de normas de construcción (04.4.3); las prestaciones en efectivo o\nen especie para ayudar a las familias necesitadas a pagar una vivienda (10.6.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "EXIMBANK-K",
                "codigo" => "418",
                "denominacion" => "Banco de Importaciones - Exportaciones Corea",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "ARG",
                "codigo" => "542",
                "denominacion" => "Argentina",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "-",
                "codigo" => "6.2.",
                "denominacion" => "Desarrollo comunitario",
                "descripcion" => "Gastos de promoción, regulación, control y administración de los asuntos y servicios relacionados con\nel desarrollo comunitario; administración de las leyes de urbanismo y las normas de utilización de\ntierras y de construcción.\nPlanificación de nuevas comunidades, ordenación territorial o de comunidades rehabilitadas; planificación\nde la creación o mejora de los servicios de vivienda, industria, servicios públicos, salud,\neducación, cultura, esparcimiento, etcétera, para las comunidades; elaboración de planes de\nfinanciación de proyectos.\nProducción y difusión de información general, documentación técnica y estadísticas sobre asuntos y\nservicios relacionados con el desarrollo comunitario.\nExcluye: La ejecución de proyectos, es decir, la construcción propiamente dicha de viviendas, edificios\nindustriales, calles, servicios públicos, servicios culturales, etcétera (clasificados atendiendo a su\nfunción); la reforma agraria y el reasentamiento (04.2.1); la administración de las normas de\nconstrucción (04.4.3) y de las normas relativas a la vivienda (06.1.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "6.3.",
                "denominacion" => "Abastecimiento de agua",
                "descripcion" => "Gastos de promoción, regulación, control y administración de los asuntos relacionados con el\nabastecimiento de agua; evaluación de las necesidades futuras y determinación de la disponibilidad\nen función de dicha evaluación; supervisión de todos los aspectos relacionados con el abastecimiento\nde agua potable, incluidos la pureza del agua, los precios y los controles de cantidad.\nConstrucción o explotación de sistemas de abastecimiento de agua diferentes de las empresas.\nProducción y difusión de información general, documentación técnica y estadísticas sobre asuntos y\nservicios relacionados con el abastecimiento de agua.\nDonaciones, préstamos, transferencias o subsidios en apoyo a la explotación, la construcción, el\nmantenimiento o el mejoramiento de los sistemas de abastecimiento de agua.\nExcluye: sistemas de riego (04.2.1); los proyectos polivalentes (04.7.4); la recogida y el tratamiento de\naguas residuales (05.2.0)",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "6.4.",
                "denominacion" => "Alumbrado público",
                "descripcion" => "Gastos de administración de los asuntos relacionados con el alumbrado público; creación y regulación\nde las normas de alumbrado público.\nInstalación, gestión, mantenimiento, mejora, etcétera, del alumbrado público.\nExcluye: los asuntos y servicios de alumbrado relacionados con la construcción y la explotación de las\ncarreteras (04.5.1).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "6.5.",
                "denominacion" => "Investigación y desarrollo relacionados con la vivienda y los servicios comunitarios",
                "descripcion" => "Administración y gestión de organismos gubernamentales dedicados a investigación aplicada y\ndesarrollo experimenta] relacionados con la vivienda y los servicios comunitarios.\nComprende donaciones, préstamos o subsidios en apoyo a investigación aplicada y desarrollo\nexperimental relacionados con la vivienda y los servicios comunitarios realizados por órganos no\ngubernamentales, como institutos de investigación y universidades.\nExcluye: investigación básica (01.4.0); investigación aplicada y desarrollo experimental relacionados\ncon métodos o materiales de construcción (04.8.4).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "6.6.",
                "denominacion" => "Otros servicios de la vivienda y servicios comunitario",
                "descripcion" => "Gastos de administración, gestión o apoyo de actividades como formulación, administración,\ncoordinación y vigilancia de políticas, planes, programas y presupuestos generales relacionados con\nla vivienda y los servicios comunitarios; preparación y ejecución de legislación y normas de actuación\nrelacionadas con la vivienda y los servicios comunitarios; producción y difusión de información general,\ndocumentación técnica y estadísticas relacionadas con la vivienda y los servicios comunitarios,\nque por su generalidad no fueron factibles de asignarse en alguna función determinada de esta\nfinalidad.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "7.",
                "denominacion" => "SALUD",
                "descripcion" => "Comprende los gastos efectuados por servicios de la salud pública como la formulación y la administración\nde la política gubernamental; la fijación y ejecución de las normas sobre el personal médico y paramédico\ny sobre los hospitales, clínicas, consultorios y otros; la regulación y concesión de licencias a los\nproveedores de servicios de salud; y la investigación aplicada y el desarrollo experimental en asuntos\nmédicos y de salud.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "7.1.",
                "denominacion" => "Productos, útiles y equipo médicos",
                "descripcion" => "Este grupo incluye los medicamentos, las prótesis, los útiles y equipos médicos y otros productos\nrelacionados con la salud obtenidos por particulares o familias, con receta o sin ella y proporcionados\nnormalmente por farmacéuticos o proveedores de equipos médicos. Se trata de productos que se consumen fuera de las instalaciones o centros de salud. Estos productos, proporcionados\ndirectamente por los médicos, dentistas y paramédicos a los pacientes que acuden a consultas\nexternas o por los hospitales y otros centros parecidos a los pacientes que están ingresados, están\nincluidos en servicios de consulta externa (07.2) o en servicios hospitalarios (07.3).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "7.1.1.",
                "denominacion" => "Productos farmacéuticos",
                "descripcion" => "Gastos inherentes de administración, gestión y apoyo del suministro de productos farmacéuticos\ncomo, por ejemplo, preparados medicinales, drogas medicinales, medicinas patentadas, sueros y\nvacunas, vitaminas y minerales, aceite de hígado de bacalao y aceite de hígado de mero y\nanticonceptivos orales.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "7.1.2.",
                "denominacion" => "Otros productos médicos",
                "descripcion" => "Gastos relacionados a suministro de productos médicos como, por ejemplo, termómetros clínicos,\nvendas adhesivas y no adhesivas, jeringuillas hipodérmicas, botiquines de primeros auxilios,\nbotellas de agua caliente y bolsas de hielo, artículos de punto para uso médico como, por ejemplo,\nmedias clásticas y rodilleras, pruebas de embarazo, preservativos y dispositivos anticonceptivos\nmecánicos; administración, gestión y apoyo del suministro de otros productos médicos recetados.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "7.1.3.",
                "denominacion" => "Aparatos y equipos terapéuticos",
                "descripcion" => "Gastos relacionados para el suministro de aparatos y equipos terapéuticos como, por ejemplo,\nlentes correctoras y lentes de contacto, prótesis auditivas, ojos de cristal, miembros artificiales y\notras prótesis, bragueros y otros soportes ortopédicos, calzado ortopédico, cinturones\nquirúrgicos, bragueros y soportes, collarines cervicales, equipos de masaje módico y lámparas\npara uso médico, sillas de ruedas automáticas o no automáticas y vehículos para enfermos, camas\n\"especiales\", muletas, aparatos electrónicos y de otro tipo para medir la presión arterial, etcétera;\nadministración, gestión o apoyo del suministro de aparatos y equipos terapéuticos recetados;\nincluye: dentaduras postizas, pero no los costos de las pruebas; la reparación de aparatos y\nequipos terapéuticos.\nExcluye: el alquiler de equipos terapéuticos (07.2.4).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "7.2.1.",
                "denominacion" => "Servicios médicos generales",
                "descripcion" => "Gastos de administración, inspección, gestión o apoyo de los servicios proporcionados por los\nmédicos generales y las clínicas médicas generales que proporcionan principalmente servicios de\nconsulta externa no limitados a una especialidad médica en particular.\nExcluye: los servicios de los laboratorios de análisis médicos y los centros de radiografía (07.2.4).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "EXIMBANK-U",
                "codigo" => "419",
                "denominacion" => "Banco de Importaciones - Exportaciones (EE. UU.)",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "ACDI",
                "codigo" => "511",
                "denominacion" => "Agencia Canadiense para el Desarrollo Internacional",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "JICA",
                "codigo" => "512",
                "denominacion" => "Agencia de Cooperación Internacional del Japón",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "-",
                "codigo" => "7.2.2.",
                "denominacion" => "Servicios médicos especializados",
                "descripcion" => "Gastos de administración, inspección, gestión o apoyo para la prestación de los servicios médicos\nespecializados prestados por las clínicas médicas especializadas o los médicos especialistas,\nincluye, los servicios de ortodoncia.\nExcluye: las clínicas odontológicas y los dentistas (07.2.3); los servicios de los laboratorios de\nanálisis médicos y los centros de radiografía (07.2.4).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "7.2.3.",
                "denominacion" => "Servicios odontológicos",
                "descripcion" => "Prestación de servicios odontológicos a pacientes que acuden a consultas externas.\nGastos de administración, inspección, gestión y apoyo de los servicios de las clínicas odontológicas\ngenerales o especializadas, los dentistas generales o especialistas, los higienistas dentales y otros\nauxiliares dentales; incluye, los costos de prueba de dentaduras postizas.\nExcluye: dentaduras postizas (07.1.3); servicios de ortodoncia (07.2.2); servicios de laboratorios\nde análisis médicos y centros de radiografía (07.2.4).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "7.2.4.",
                "denominacion" => "Servicios paramédicos",
                "descripcion" => "Gastos de administración, inspección, gestión o apoyo de los servicios de salud prestados por\nsalud paramédica y de clínicas supervisadas por personal paramédico (enfermeros, parteras,\nfisioterapeutas, ergo terapeutas, terapeutas de dicción u otro personal paramédico), incluye,\nacupunturistas, quiropodistas, quiroprácticos, optometristas, especialistas en medicina\ntradicional, etcétera, laboratorios de análisis médicos y centros de radiografía; alquiler de equipos\nterapéuticos; terapia de gimnasia correctora recetada por personal médico; baños termales o\ntratamientos de agua de mar para pacientes de consulta externa; servicios de ambulancia\ncomplementarios a los servicios de ambulancia de los hospitales.\nExcluye: laboratorios de servicios de salud públic",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "7.3.",
                "denominacion" => "Servicios hospitalarios",
                "descripcion" => "Gastos de los servicios de hospitales generales y especializados, centros médicos, centros de servicios\nde maternidad, residencias de ancianos y residencias de convalecencia, prestación de servicios de\nsalud pública e investigación y desarrollo relacionados con la salud.\nLa hospitalización se define como la estancia de un paciente en un hospital durante el tiempo que\ndura su tratamiento. Las estancias en el hospital durante el día, el tratamiento hospitalario en casa y\nlos hospitales para personas con enfermedades terminales se incluyen en esta categoría.\nEste grupo comprende los servicios de hospitales generales y especializados, centros médicos,\ncentros de servicios de maternidad, residencias de ancianos y residencias de convalecencia que\nproporcionan servicios principalmente a pacientes ingresados, los servicios de bases de los hospitales\nmilitares, los servicios de las instituciones de atención a las personas mayores que tengan como\ncomponente esencial la vigilancia médica, y los servicios de los centros de rehabilitación que presten\natención médica a pacientes ingresados y terapia de rehabilitación cuyo objetivo sea tratar al\npaciente en lugar de proporcionar apoyo a largo plazo.\nLos hospitales se definen como instituciones que ofrecen atención a pacientes ingresados bajo la supervisión directa de médicos titulados. Los centros asistenciales, los centros de servicios de\nmaternidad, las residencias de la tercera edad y las residencias de convalecencia también\nproporcionan atención a pacientes ingresados, pero sus servicios son supervisados y a menudo\nprestados por personal de titulación inferior a la de un médico.\nEste grupo no incluye instalaciones como los hospitales militares de campaña (02.1), los quirófanos,\nlas clínicas y los dispensarios que prestan servicios exclusivamente a los pacientes de consulta externa\n(07.2), las instituciones para personas discapacitadas y los centros de rehabilitación que\nprincipalmente prestan apoyo a largo plazo (10.1.2), y las residencias para personas mayores\njubiladas (10.2.0). Tampoco cubre los pagos a pacientes por pérdidas de ingresos como consecuencia\nde hospitalización (10.1.1).\nLos servicios hospitalarios incluyen los medicamentos, las prótesis, los aparatos y equipos médicos y\notros productos relacionados con la salud proporcionada a los pacientes del hospital. También\nincluyen el gasto no médico de los hospitales en concepto de administración, plantilla no médica,\nalimentos y bebidas, alojamiento (incluido el alojamiento del personal), etc.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "7.3.1.",
                "denominacion" => "Servicios hospitalarios generales",
                "descripcion" => "Gastos relacionados a la administración, inspección, gestión o apoyo de los hospitales que no\nlimitan la prestación de sus servicios a una determinada especialidad médica.\nExcluye: centros médicos que no están bajo supervisión directa de un médico titulado (07.3.3).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "7.3.2.",
                "denominacion" => "Servicios hospitalarios especializados",
                "descripcion" => "Gastos de administración, inspección, gestión o apoyo de los hospitales que limitan la prestación\nde sus servicios a una determinada especialidad médica, por ejemplo, enfermedades del tórax y\ntuberculosis, lepra, cáncer, otorrinolaringología, psiquiatría, obstetricia, pediatría, etcétera.\nExcluye: los centros de servicios de maternidad que no están bajo la supervisión directa de un\nmédico titulado (07.3.3).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "7.3.3.",
                "denominacion" => "Servicios médicos y de centros de maternidad",
                "descripcion" => "Gastos de administración, inspección, gestión o apoyo de prestación de servicios médicos y de\ncentros de maternidad.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "7.3.4.",
                "denominacion" => "Servicios de residencias de la tercera edad y residencias de convalecencia",
                "descripcion" => "Prestación de servicios de las residencias de la tercera edad o de convalecencia.\nGastos de administración, inspección, gestión o apoyo a las residencias de la tercera edad y de\nconvalecencia, que proporcionan servicios a los pacientes ingresados que se recuperan de una\noperación quirúrgica o de una enfermedad o dolencia debilitante, que exige principalmente la\nvigilancia y el suministro de medicamentos, la fisioterapia y la reeducación para compensar por la\npérdida de una función, o que exige descanso, incluye, las instituciones que atienden a las\npersonas mayores y en las que la vigilancia médica es un componente esencial; los centros de\nrehabilitación que proporcionan atención sanitaria a los pacientes ingresados y terapia de\nrehabilitación, cuando el objetivo es tratar al paciente en lugar de proporcionar apoyo a largo\nplazo.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "7.4.",
                "denominacion" => "Servicios de salud pública",
                "descripcion" => "Gastos de administración, inspección, gestión o apoyo a la prestación de los servicios de salud pública, como la gestión de los bancos de sangre (extracción, procesamiento, almacenamiento, despacho),\ndiagnóstico de enfermedades (cáncer, tuberculosis, enfermedades venéreas), prevención\n(inmunización, inoculación), vigilancia (nutrición infantil, salud infantil), recopilación de datos\nepidemiológicos, servicios de planificación familiar, etcétera.\nPreparación y difusión de información sobre asuntos relacionados con la salud pública.\nIncluye, servicios de salud pública prestados por equipos especiales a grupos de clientes, la mayoría\nde los cuales se encuentran en buena salud, en los lugares de trabajo, las escuelas y otros lugares\ndistintos de los centros médicos; servicios de salud pública no relacionados con un hospital, una clínica\no un médico; servicios de salud pública que no son prestados por médicos titulados.\nExcluye: laboratorios de análisis médicos (07.2.4); laboratorios que determinan las causas de las\nenfermedades (07.5.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "7.5.",
                "denominacion" => "Investigación y desarrollo relacionados con la salud",
                "descripcion" => "Gastos de administración y gestión de los organismos gubernamentales dedicados a investigación\naplicada y desarrollo experimental relacionados con la salud.\nComprende donaciones, préstamos o subsidios en apoyo a investigación aplicada y desarrollo\nexperimental relacionados con la salud realizados por órganos no gubernamentales, como institutos\nde investigación y universidades, incluye, los laboratorios dedicados a determinar las causas de las\nenfermedades.\nExcluye: investigación básica (01.4.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "7.6.",
                "denominacion" => "Otros servicios de la salud",
                "descripcion" => "Gastos de administración, gestión o apoyo de actividades como formulación, administración,\ncoordinación y vigilancia de políticas, planes, programas y presupuestos generales en materia de\nsalud; preparación y ejecución de legislación y normas de actuación sobre prestación de servicios de\nsalud, incluida la concesión de licencias a los establecimientos médicos y al personal médico y\nparamédico; producción y difusión de información general, documentación técnica y estadísticas\nsobre salud, que por su generalidad no fueron factibles de asignarse en alguna función determinada\nde esta finalidad.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "USAID",
                "codigo" => "513",
                "denominacion" => "Agencia de los EE.UU. para el Desarrollo",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "-",
                "codigo" => "8.",
                "denominacion" => "ACTIVIDADES RECREATIVAS, CULTURA Y RELIGIÓN",
                "descripcion" => "Gastos relacionados a las actividades como la formulación y administración de la política del gobierno, la\nformulación y ejecución de legislación y normas de actuación en relación con los servicios recreativos y\ndeportivos; culturales; de radio, televisión y servicios editoriales; y asuntos religiosos y otros servicios\ncomunitarios.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "8.1.",
                "denominacion" => "Servicios recreativos y deportivos",
                "descripcion" => "Gastos de administración de asuntos deportivos y recreativos; supervisión y regulación de\ninstalaciones deportivas; gestión o apoyo de instalaciones para la práctica deportiva o los acontecimientos relacionados con deportes activos (campos de deporte, canchas de tenis, canchas de\nsquash, pistas de atletismo, campos de golf, cuadriláteros de boxeo, pistas de patinaje, gimnasios,\netcétera); gestión o apoyo de instalaciones para la práctica deportiva o los acontecimientos\nrelacionados con los deportes pasivos (principalmente, lugares especiales para jugar a las cartas y a\nlos juegos de mesa, etcétera); gestión o apoyo de instalaciones para actividades recreativas (parques,\nplayas, zonas de acampada y alojamiento público cercano a estos lugares, piscinas de natación, baños\npúblicos para la higiene personal, etcétera).\nComprende donaciones, préstamos o subsidios en apoyo a equipos o a jugadores o competidores\nindividuales, incluye, instalaciones para espectadores; la facilitación de la representación del equipo\nnacional, regional o local en acontecimientos deportivos.\nExcluye: jardines zoológicos o botánicos, acuarios, viveros e instalaciones similares (08.2.0);\ninstalaciones deportivas o recreativas de las instituciones educativas (que se clasifican en la\nsubfunción pertinente de la División 09).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "8.2.",
                "denominacion" => "Servicios culturales",
                "descripcion" => "Gastos de administración de asuntos culturales; supervisión y regulación de instalaciones culturales;\ngestión o apoyo de instalaciones para actividades culturales (bibliotecas, museos, galerías de arte,\nteatros, salones de exposición, monumentos, edificios y lugares históricos, jardines zoológicos y\nbotánicos, acuarios, viveros, etcétera); producción, gestión o apoyo de actos culturales (conciertos,\nproducciones teatrales y cinematográficas, exposiciones de arte, etcétera).\nDonaciones, préstamos o subsidios en apoyo a artistas, escritores, diseñadores, compositores y otros\nparticulares que se dedican a las artes, o a organizaciones que participan en la promoción de\nactividades culturales, incluye, las celebraciones nacionales, regionales o locales, siempre que su\nfinalidad principal no sea la de atraer turistas.\nExcluye: los actos culturales que vayan a presentarse en el extranjero (01.1.3); las celebraciones\nnacionales, regionales o locales cuyo objetivo principal sea atraer turistas (04.7.3); la producción de\nmaterial cultural para su distribución por radio o televisión (08.3.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "8.3.",
                "denominacion" => "Servicios de radio, televisión y servicios editoriales",
                "descripcion" => "Gastos de administración de asuntos relacionados con la radio, la televisión y la edición; supervisión\ny regulación de los servicios de radio y televisión y los servicios editoriales; gestión o apoyo de los\nservicios de radio y televisión y los servicios editoriales.\nDonaciones, préstamos o subsidios en apoyo a la construcción o la adquisición de instalaciones para\ntelevisión o radio; la construcción o adquisición de locales, equipo o materiales para la edición de\nperiódicos, revistas o libros; la producción de material para radio o televisión y su presentación en\nradio o televisión; la obtención de noticias u otras informaciones; la distribución de las obras\npublicadas.\nExcluye: las imprentas oficiales (01.3.3) y los programas de educación por radio o televisión (09).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "8.4.",
                "denominacion" => "Servicios religiosos y otros servicios comunitarios",
                "descripcion" => "Gastos de administración de los asuntos religiosos y otros asuntos comunitarios; suministro de\ninstalaciones para servicios religiosos y otros servicios comunitarios, y apoyo a su gestión,\nmantenimiento y reparación; pago al clero y a otros representantes de instituciones religiosas; apoyo a la celebración de servicios religiosos; donaciones, préstamos o subsidios en apoyo a hermandades,\norganizaciones cívicas, juveniles y sociales o sindicatos laborales y partidos políticos.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "8.5.",
                "denominacion" => "Investigación y desarrollo relacionados con esparcimiento, cultura y religión",
                "descripcion" => "Gastos de administración y gestión de organismos gubernamentales dedicados a investigación\naplicada y desarrollo experimental relacionados con esparcimiento, cultura y religión.\nDonaciones, préstamos o subsidios en apoyo a investigación aplicada y el desarrollo experimental\nrelacionadas con esparcimiento, cultura y religión realizados por órganos no gubernamentales, como\ninstitutos de investigación y universidades.\nExcluye investigación básica (01.4.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "8.6.",
                "denominacion" => "Otras actividades recreativas, cultura y religión",
                "descripcion" => "Gastos de administración, gestión o apoyo de actividades como formulación, administración,\ncoordinación y vigilancia de políticas, planes, programas y presupuestos generales para la promoción\ndel deporte, el esparcimiento, la cultura y la religión; preparación y ejecución de legislación y normas\nde actuación en relación con la prestación de servicios recreativos y culturales; producción y difusión\nde información general, documentación técnica y estadísticas sobre esparcimiento, cultura y religión,\nque por su generalidad no fueron factibles de asignarse en alguna función determinada de esta\nfinalidad.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "9.",
                "denominacion" => "EDUCACIÓN",
                "descripcion" => "Acciones relacionados a los servicios docentes que tienen que ver con asuntos como la formulación y\nadministración de la política del gobierno; el establecimiento y aplicación de las normas; la regulación,\nautorización y supervisión de los centros de enseñanza, y la investigación aplicada y el desarrollo\nexperimental en relación con los asuntos y servicios docentes.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "9.1.",
                "denominacion" => "Enseñanza preescolar y enseñanza primaria",
                "descripcion" => "",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "9.1.1.",
                "denominacion" => "Enseñanza preescolar",
                "descripcion" => "Gastos de administración, inspección, gestión o apoyo de escuelas primarias, guarderías y jardines\nde infancia que imparten educación previa a la primaría. Estos programas están destinados\nesencialmente a familiarizar a niños menores de 6 años de edad con un entorno de tipo escolar.\nExcluye: servicios subsidiarios a la educación (09.6.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "9.1.2.",
                "denominacion" => "Enseñanza primaria",
                "descripcion" => "Gastos de administración, inspección, gestión o apoyo de las escuelas y otras instituciones que\nimparten educación primaria. Estos programas están destinados a proporcionar la enseñanza\nbásica por el período de 6 años., la edad oficial de admisión a este ciclo corresponde a niños de 6\naños; incluye, programas escolares o extraescolares de alfabetización, cuyo contenido es similar\na los de enseñanza primaria, destinados a personas que tienen demasiada edad para ingresar en\nuna escuela primaria.\nExcluye: servicios auxiliares de la educación (09.6.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "9.2.",
                "denominacion" => "Enseñanza secundaria",
                "descripcion" => "",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "DANIDA",
                "codigo" => "514",
                "denominacion" => "Asistencia Internacional Danesa para el Desarrollo",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "COSUDE",
                "codigo" => "515",
                "denominacion" => "Agencia Suiza para el Desarrollo y la Cooperación",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "KFW",
                "codigo" => "516",
                "denominacion" => "Instituto Alemán de Crédito para la Reconstrucción",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "BEL",
                "codigo" => "543",
                "denominacion" => "Bélgica",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "-",
                "codigo" => "9.2.1.",
                "denominacion" => "Enseñanza secundaria básica",
                "descripcion" => "Gastos de administración, inspección, gestión o apoyo de escuelas y otras instituciones que imparten educación secundaria básica. Estos programas están destinados a proporcionar\nenseñanza complementaria a los 2 últimos años del ciclo de primaria.\nComprende becas, donaciones, préstamos o subsidios relativos a esta función, incluye, educación\nsecundaria básica de extramuros impartida a adultos y jóvenes.\nExcluye: servicios auxiliares de la educación (09.6.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "9.2.2.",
                "denominacion" => "Enseñanza secundaria avanzada",
                "descripcion" => "Gastos de administración, inspección, gestión o apoyo de escuelas y otras instituciones que\nimparten educación secundaria. Estos programas están destinados a proporcionar la enseñanza\npor el lapso de 4 años, tras 8 años de educación escolar (enseñanza primaria y enseñanza\nsecundaria básica.).\nComprende becas, donaciones, préstamos o subsidios relativos a esta función, incluye, educación\nsecundaria avanzada de extramuros impartida a adultos y jóvenes.\nExcluye: servicios auxiliares de la educación (09.6.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "9.3.",
                "denominacion" => "Enseñanza postsecundaria no terciaria",
                "descripcion" => "Gastos de administración, inspección, gestión o apoyo de universidades y otras instituciones que\nimparten programas educativos pre-universitarios, dado que éstos constituyen un canal de ingreso,\nen algunos casos obligatorio, a la educación superior universitaria y son, por sus contenidos,\nprogramas de post secundarios.\nComprende becas, donaciones, préstamos o subsidios en apoyo e estudiantes de educación no\nterciaria.\nExcluye: servicios auxiliares de la educación (09.6.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "9.4.",
                "denominacion" => "Enseñanza terciaria",
                "descripcion" => "",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "9.4.1.",
                "denominacion" => "Primera etapa de la enseñanza terciaria",
                "descripcion" => "Gastos de administración, inspección, gestión o apoyo de universidades y otras instituciones que\nimparten programas educativos de formación de técnico universitario medio con una duración de\n2 años; programas de formación de superior con una duración de 3 años (o un año adicional al\nprograma anterior; carreras universitarias conducentes a la obtención de títulos universitarios de\nlicenciatura (primera certificación de mayor duración: 5 años); cursos de especialidad que\ncomplementan la formación anterior. Tienen una duración de un año (segunda certificación);\nprogramas de maestría con una duración de 2 años (segunda certificación); programa de primera\ncertificación en este nivel, el ofrecido por los institutos normales superiores y que conducen a la\ncertificación de profesor normalista.\nNótese que estos profesionales pueden continuar sus estudios a nivel universitario y acceder a\nuna licenciatura, programas de técnico medio (2 años) y técnico superior (3 años de duración)\nofrecidos por los institutos superiores tecnológicos.\nComprende becas, donaciones, préstamos o subsidios en apoyo e estudiantes de educación\nterciaria.\nExcluye: los servicios subsidiarios de la educación (09.6.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "9.4.2.",
                "denominacion" => "Segunda etapa de la enseñanza terciaria",
                "descripcion" => "Gastos de administración, inspección, gestión o apoyo de universidades y otras instituciones que\nimparten únicamente programas de post-grado conducente al doctorado.\nComprende becas, donaciones, préstamos o subsidios en apoyo a estudiantes de educación de la\nsegunda etapa terciaria.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "9.5.",
                "denominacion" => "Enseñanza no atribuible a ningún nivel",
                "descripcion" => "Gastos de administración, inspección, gestión o apoyo a instituciones que imparten educación no\nbasada en niveles (es decir, programas docentes, generalmente para adultos, que no requieren\nninguna instrucción previa especial, en particular programas de formación profesional y de desarrollo\ncultural).\nComprende becas, donaciones, préstamos o subsidios en apoyo a estudiantes que participan en\nprogramas docentes no definibles por niveles.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "9.6.",
                "denominacion" => "Servicios auxiliares de la educación",
                "descripcion" => "Gastos de administración, inspección, gestión y apoyo del transporte, la alimentación, el alojamiento,\nla atención médica y odontológica y otros servicios auxiliares conexos, principalmente para los\nestudiantes, sea cual fuere el nivel educativo de éstos.\nExcluye: los servicios escolares de vigilancia y prevención en materia de salud (07.4.0); becas,\ndonaciones, préstamos y subsidios en efectivo para sufragar los costos de los servicios auxiliares\n(09.1), (09.2), (09.3), (09.4) o (09.5).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "9.7.",
                "denominacion" => "Investigación, capacitación y desarrollo relacionados con la educación",
                "descripcion" => "Gastos de administración y gestión de organismos gubernamentales dedicados a investigación\naplicada y desarrollo experimental relacionados con educación.\nComprende donaciones, prestaciones y subsidios en apoyo a investigación aplicada, capacitación y\ndesarrollo experimental relacionados con la educación y realizados por órganos como institutos de\ninvestigación y universidades.\nExcluye: investigación básica (01.4.0)",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "9.8.",
                "denominacion" => "Otros servicios de la educación",
                "descripcion" => "Gastos de administración, gestión o apoyo de actividades como formulación, administración,\ncoordinación y vigilancia de políticas, planes, programas y presupuestos generales en materia de\neducación; preparación y ejecución de legislación y normas de actuación sobre la prestación de\neducación, incluida la autorización de establecimientos docentes; producción y difusión de\ninformación general, documentación técnica y estadísticas sobre educación, que por su generalidad\nno fueron factibles de asignarse en alguna función determinada de esta finalidad.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "9.9.",
                "denominacion" => "Desarrollo humano relacionado a la Educación",
                "descripcion" => "Comprende los gastos destinados a mejorar cualitativamente el desarrollo humano mediante\nprogramas de apoyo social con la finalidad de combatir la deserción estudiantil en el nivel primario y\nsecundario; incluye los gastos administrativos.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "10.",
                "denominacion" => "IGUALDAD DE GÉNERO, EQUIDAD Y PROTECCIÓN SOCIAL",
                "descripcion" => "Gastos relacionados a actividades de formulación y ejecución de políticas, programas y proyectos\ndestinados a mejorar cualitativamente el ejercicio de las desigualdades sociales y de género y los servicios\ncolectivos de Protección Social a grupos vulnerables, cuidado de la familia y de la comunidad, los derechos\nhumanos de las mujeres, los derechos económicos, sociales, políticos, culturales y el derecho a una vida\nlibres de violencia, mediante la legislación, investigación aplicada, desarrollo experimental y otras normas\nde regulación sobre la Igualdad de Género, Equidad y Protección Social.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "10.1.",
                "denominacion" => "Enfermedad e incapacidad",
                "descripcion" => "",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "10.1.1.",
                "denominacion" => "Enfermedad",
                "descripcion" => "Gastos de administración, gestión o apoyo para la prestación de protección social en forma de\nbeneficios en efectivo o en especie que sustituyan en su totalidad o en parte la pérdida de ingresos\ndurante una incapacidad laboral transitoria debida a enfermedad o lesión.\nBeneficios en efectivo, como el pago de la licencia de enfermedad a una tasa fija o en función de\nlos ingresos, y los pagos varios para ayudar a personas que temporalmente no pueden trabajar\ndebido a una enfermedad o lesión.\nBeneficios en especie, como la asistencia en las tareas diarias prestada a personas que\ntemporalmente no pueden trabajar debido a una enfermedad o lesión (ayuda doméstica, servicios\nde transporte, etcétera).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "GIZ",
                "codigo" => "517",
                "denominacion" => "Agencia de Cooperación Técnica de la República Alemana",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "JBIC",
                "codigo" => "518",
                "denominacion" => "Banco de Cooperación Internacional del Japón",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "-",
                "codigo" => "10.1.2.",
                "denominacion" => "Incapacidad",
                "descripcion" => "Gastos de administración, gestión o apoyo parar la prestación de protección social en forma de\nbeneficios en efectivo o en especie a personas que están parcial o totalmente incapacitadas para\nparticipar en una actividad económica o llevar una vida normal debido a un impedimento físico o\nmental permanente o que probablemente perdurará más allá de un período mínimo\ndeterminado.\nPrestaciones en efectivo, como las pensiones por invalidez para personas que no llegan a la edad\nnormal de jubilación y sufren una incapacidad que les impide trabajar, el pago de la jubilación\nanticipada a trabajadores mayores que se jubilan antes de llegar a la edad normal de jubilación\ndebido a la reducción de su capacidad de trabajo, las asignaciones para las personas que cuidan\nde una persona incapacitada, las asignaciones a personas discapacitadas que realizan trabajos\nadaptados a su condición o participan en programas de formación profesional, y otros pagos\nefectuados periódicamente o de una sola vez a personas discapacitadas por razones de protección\nsocial.\nPrestaciones en especie, como el alojamiento y, a veces, los alimentos proporcionados a personas\ndiscapacitadas en establecimientos adecuados; la asistencia a personas discapacitadas para\nayudarlas en sus tareas diarias (ayuda doméstica, servicios de transporte, etcétera); las\nasignaciones a quienes cuidan de una persona discapacitada; los programas de capacitación para\nfomentar la rehabilitación laboral y social de las personas discapacitadas; la prestación de bienes\ny servicios varios apersonas discapacitadas para que éstas puedan participar en actividades\nculturales y de ocio o viajar y participar en la vida comunitaria.\nExcluye: prestaciones en efectivo y en especie pagaderas a personas discapacitadas una vez que\néstas alcanzan la edad normal de jubilación (10.2.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "10.2.",
                "denominacion" => "Edad avanzada",
                "descripcion" => "Gastos de administración, gestión o apoyo para la prestación de protección social en forma de\nprestaciones en efectivo y en especie para cubrir los riesgos relacionados con la vejez.\nPrestaciones en efectivo, como las pensiones de vejez para personas que alcanzan la edad normal\nde jubilación, las pensiones de vejez anticipadas para trabajadores mayores que se jubilan antes\nde alcanzar la edad normal de jubilación, las pensiones de jubilación parciales, pagadas antes o\ndespués de la edad normal de jubilación a los trabajadores mayores que siguen trabajando pero\nreducen su jornada laboral, las asignaciones a las personas que cuidan de las personas mayores,\notros pagos efectuados periódicamente o de una sola vez por jubilación o vejez.\nPrestaciones en especie, como el alojamiento y, a veces, los alimentos proporcionados a las\npersonas mayores que residen en centros especializados o viven con sus familias en\nestablecimientos adecuados, la asistencia prestada a personas mayores en sus tareas diarias\n(ayuda doméstica, servicios de transporte, etcétera), las asignaciones a las personas que cuidan\nde una persona mayor, los bienes y servicios varios dados a personas mayores para que puedan\nparticipar en actividades culturales y de ocio, viajar o participar en la vida comunitaria, incluye,\nlos planes de pensiones para el personal militar y los empleados públicos.\nExcluye: las prestaciones por jubilación anticipada para los trabajadores mayores que se jubilan\nantes de alcanzar la edad normal de jubilación debido a una incapacidad (10.1.2) o al desempleo\n(10.5.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "10.3.",
                "denominacion" => "Derechohabientes",
                "descripcion" => "Gastos de administración, gestión o apoyo para la prestación de protección social en forma de\nprestaciones en efectivo y en especie a los derechohabientes de una persona fallecida (como el\ncónyuge, el ex cónyuge, los hijos, los nietos, los padres y otros familiares)\nPrestaciones en efectivo, como las pensiones para derechohabientes, los pagos en caso de\nfallecimiento y otros pagos efectuados periódicamente o de una sola vez a los derechohabientes.\nPrestaciones en especie, como el pago de los gastos de funeral, la prestación de bienes y servicios\nvarios a los derechohabientes para que éstos puedan participar en la vida comunitaria.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "10.4.",
                "denominacion" => "Familia e hijos",
                "descripcion" => "Gastos de administración, gestión o apoyo para la prestación de protección social en forma de\nprestaciones en efectivo y en especie a familias con hijos a cargo.\nPrestaciones en efectivo, como asignaciones por maternidad, pagos en caso de nacimiento,\nlicencias por cuidado de los hijos, subsidios familiares o subvenciones por hijos a cargo, otros\npagos efectuados periódicamente o de una sola vez para apoyar a las familias y ayudarlas a\nsufragar los costos de ciertas necesidades (por ejemplo, las familias monoparentales o las familias\ncon hijos minusválidos).\nPrestaciones en especie, tales como la prestación de alojamiento y la provisión de comida a niños\nen edad preescolar durante todo el día o parte del día, la ayuda financiera para el pago de una\nniñera que cuide de los niños durante el día, la prestación de alojamiento y alimentos a niños y\nfamilias de forma permanente (en guarderías, centros infantiles integrales, centros de\nacogimiento y otros), la prestación de bienes y servicios a los niños o a las personas que los cuidan\nen sus propias casas, la prestación de bienes y servicios varios a familias, jóvenes o niños (centros de vacaciones y de ocio).\nExcluye: servicios de planificación de la familia (0.7.4.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "10.4.1.",
                "denominacion" => "Niñez y adolescencia",
                "descripcion" => "Gastos de administración, gestión o apoyo para la prestación de protección social para menores\nde seis 18 años; para la Promoción de Derechos, en el servicio de adopción, Centros de\nacogimiento, Centros de Reintegración Social, Centros de orientación social, participación y\nconformación de comités; para la implementación y aplicación de políticas públicas para niñez y\nadolescencia y otros.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "10.5.",
                "denominacion" => "Desempleo",
                "descripcion" => "Gastos de administración, gestión o apoyo para la prestación de protección social en forma de\nprestaciones en efectivo o en especie a personas que están capacitadas para trabajar y dispuestas\na trabajar pero no pueden encontrar un empleo adecuado.\nPrestaciones en efectivo, como los subsidios totales o parciales de desempleo, las prestaciones\npor jubilación anticipada para trabajadores mayores que se jubilan antes de alcanzar la edad\nnormal de jubilación debido a! desempleo o a una reducción de su jornada laboral causada por\nmedidas económicas, las asignaciones a determinados sectores de la población activa que\nparticipan en programas de capacitación para perfeccionar su potencial para el empleo, indemnización\npor supresión del puesto de trabajo, otros pagos efectuados periódicamente o de\nuna sola vez a los desempleados, particularmente a los desempleados de larga duración.\nPrestaciones en especie, como los pagos por movilidad y reasentamiento, la capacitación\nprofesional de personas sin trabajo o el reciclaje de personas que corren el riesgo de perder su\ntrabajo, la provisión de alojamiento, alimentos o ropa a personas desempleadas y sus familias.\nExcluye: los programas y planes generales destinados a aumentar la movilidad en el empleo,\nreducir la tasa de desempleo y promover el empleo de grupos desfavorecidos u otros grupos\ncaracterizados por elevadas tasas de desempleo (04.1.2); el pago de indemnizaciones en efectivo\no en especie a personas desempleadas una vez que alcanzan la edad normal de jubilación (10.2.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "10.6.",
                "denominacion" => "Vivienda",
                "descripcion" => "Gastos de administración, gestión o apoyo para la prestación de protección social en forma de\nprestaciones en especie para ayudar a las familias a sufragar costo de una vivienda (previa\ncomprobación de los ingresos de los beneficiarios).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "10.7.",
                "denominacion" => "Exclusión social sin especificar",
                "descripcion" => "Gastos de administración, gestión o apoyo para la prestación de protección social en forma de\nprestaciones en efectivo y en especie a las víctimas de la exclusión social o las personas que son\nvulnerables a la exclusión social (por ejemplo, las personas indigentes, las personas con escasos\ningresos, los inmigrantes, los indígenas, los refugiados, los alcohólicos o toxicómanos, las personas\nque han sido víctimas de actos criminales violentos, etcétera).\nAdministración y gestión de dichos planes de protección social.\nPrestaciones en efectivo, como las ayudas para complementar los ingresos u otros pagos en\nefectivo a personas indigentes y vulnerables, para reducir su nivel de pobreza o asistirlas en\nsituaciones difíciles.\nPrestaciones en especie, como el suministro de alojamiento y alimentos a corto y largo plazo a\npersonas indigentes y vulnerables, la rehabilitación de las personas que hacen un uso indebido\ndel alcohol y las drogas, la prestación de bienes y servicios para ayudar a personas vulnerables\n(como asesoramiento, albergues para estancias diurnas, asistencia en las tareas diarias, alimentos,\nropa, combustible, etcétera).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "10.8.",
                "denominacion" => "Investigación y desarrollo relacionados con la protección social",
                "descripcion" => "Gastos de administración y gestión de organismos gubernamentales dedicados a investigación\naplicada y desarrollo experimental relacionados con la protección social.\nComprende donaciones, préstamos, transferencias o subsidios en apoyo a la investigación\naplicada y desarrollo experimental relacionados con la protección social realizada por órganos no\ngubernamentales, como pueden ser institutos de investigación y universidades.\nExcluye: investigación básica (01.4.0).",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "10.9.1",
                "denominacion" => "Igualdad de Género, lucha contra la violencia en razón de género y eliminación de las\ndesigualdades",
                "descripcion" => "Gastos de gestión y apoyo de actividades como formulación, administración, coordinación y\nvigilancia de políticas, planes, programas y presupuestos generales de igualdad de género,\nfocalizados en mujeres, de cuidado de la familia y reproducción de la fuerza de trabajo, de\nconstrucción de cultura de igualdad y la redistribución igualitaria del ingreso; y otros servicios de\neliminación de las desigualdades y protección social; preparación y ejecución de legislación y otras\nnormas sobre la prestación de servicios para la igualdad de género, la eliminación de las\ndesigualdades sociales y de género y protección social. Así como para la producción y difusión de\ninformación general, documentación técnica y estadísticas.\nGastos dirigidos a la construcción de cultura despatriarcalizadora e igualdad de género a través de\nactividades de capacitación, difusión en derechos humanos y otros; gastos para servicios de\natención y protección a mujeres en situación de violencia en razón de género. Incluye gastos\nadministrativos y de funcionamiento de las Unidades funcionales para la igualdad de género y de\nlos Servicios Legales Integrales Municipales.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "-",
                "codigo" => "10.10.",
                "denominacion" => "Gestión de Riesgos y Protección Social",
                "descripcion" => "Prestación de protección social en forma de beneficios en efectivo y en especie a las víctimas de\nincendios, inundaciones, terremotos y otros desastres ocurridos en tiempos de paz; la adquisición\ny el almacenamiento de alimentos, equipos y otros suministros para su movilización urgente en\ncaso de desastres en tiempos de paz; trata y tráfico de personas y otros asuntos, servicios\nrelacionados con la protección social que por su generalidad no fueron factibles de asignarse en\nalguna función determinada de esta finalidad.",
                "fk_id_clasificador" => 4
            ],
            [
                "sigla" => "TGN",
                "codigo" => "10",
                "denominacion" => "Tesoro General de la Nación",
                "descripcion" => "Fuente de Financiamiento del Tesoro General de la Nación que se origina principalmente en\nrecaudaciones tributarias, participación en regalías, transferencias, rendimiento de activos, saldo\ndisponible de la gestión anterior y otros ingresos.",
                "fk_id_clasificador" => 5
            ],
            [
                "sigla" => "TRANSF-TGN",
                "codigo" => "41",
                "denominacion" => "Transferencias T.G.N.",
                "descripcion" => "Financiamiento que obtienen u otorgan las Instituciones Públicas por transferencias con recursos del\nTesoro General de la Nación.",
                "fk_id_clasificador" => 5
            ],
            [
                "sigla" => "PREST-TGN",
                "codigo" => "91",
                "denominacion" => "Préstamos T.G.N.",
                "descripcion" => "Financiamiento que obtienen las Instituciones Públicas por préstamos de corto o largo plazo que se\noriginan del TGN.",
                "fk_id_clasificador" => 5
            ],
            [
                "sigla" => "TGN-OT",
                "codigo" => "11",
                "denominacion" => "T.G.N. Otros Ingresos",
                "descripcion" => "Financiamiento que obtienen las Instituciones del Órgano Ejecutivo por venta de bienes y servicios, tasas,\nderechos, multas y otros que resultan de su actividad propia.",
                "fk_id_clasificador" => 5
            ],
            [
                "sigla" => "TRANSF-OTI",
                "codigo" => "46",
                "denominacion" => "Transferencias T.G.N. Otros Ingresos",
                "descripcion" => "Financiamiento que obtienen u otorgan las Instituciones Públicas por transferencias que realizan las\nInstituciones del Órgano Ejecutivo.",
                "fk_id_clasificador" => 5
            ],
            [
                "sigla" => "PREST-OTI",
                "codigo" => "96",
                "denominacion" => "Préstamos T.G.N. Otros Ingresos",
                "descripcion" => "Financiamiento que obtienen las Instituciones Públicas por préstamos de corto o largo plazo con recursos\nTGN – Otros Ingresos.",
                "fk_id_clasificador" => 5
            ],
            [
                "sigla" => "RECESP",
                "codigo" => "20",
                "denominacion" => "Recursos Específicos",
                "descripcion" => "Financiamiento que obtienen las instituciones de los Órganos Legislativo, Judicial y Electoral, Control de\nDefensa de la Sociedad y del Estado, Descentralizadas, Entidades Territoriales Autónomas, Universidades\nPúblicas, Empresas Públicas, Entidades Financieras Bancarias y No Bancarias, Entidades Públicas de la\nSeguridad Social, por concepto de ingresos de operación, venta de bienes y servicios, regalías,\ncontribuciones a la seguridad social, tasas, derechos, multas y otros que resultan de la actividad propia\nde dichas instituciones.",
                "fk_id_clasificador" => 5
            ],
            [
                "sigla" => "TRANS-ESP",
                "codigo" => "42",
                "denominacion" => "Transferencias de Recursos Específicos",
                "descripcion" => "Financiamiento que obtienen u otorgan las Instituciones Públicas por transferencias que provienen de la\nfuente de financiamiento “Recursos Específicos” y de aquellos obtenidos por préstamos de recursos\nespecíficos.",
                "fk_id_clasificador" => 5
            ],
            [
                "sigla" => "PREST-ESP",
                "codigo" => "92",
                "denominacion" => "Préstamos de Recursos Específicos",
                "descripcion" => "Financiamiento que obtienen las Instituciones Públicas por préstamos de corto o largo plazo que\nprovienen de otras entidades públicas e instituciones financieras privadas cuya fuente de financiamiento\nproviene de “Recursos Específicos”.",
                "fk_id_clasificador" => 5
            ],
            [
                "sigla" => "CREDEX",
                "codigo" => "70",
                "denominacion" => "Crédito Externo",
                "descripcion" => "Financiamiento que obtienen el Tesoro General de la Nación, los Gobiernos Autónomos Departamentales,\nMunicipales e Indígena Originario Campesino, Universidades Públicas, las Empresas Públicas y las\nInstituciones Financieras Públicas por concepto de préstamos monetizables y no monetizables obtenidos\nde organismos, países y de la banca privada internacional mediante la suscripción de convenios de crédito\nbilaterales y multilaterales.",
                "fk_id_clasificador" => 5
            ],
            [
                "sigla" => "TRANSF-CRE",
                "codigo" => "43",
                "denominacion" => "Transferencias de Crédito Externo",
                "descripcion" => "Financiamiento que obtienen u otorgan las Instituciones Públicas por transferencias de “Crédito Externo”.",
                "fk_id_clasificador" => 5
            ],
            [
                "sigla" => "PREST-CRE",
                "codigo" => "93",
                "denominacion" => "Préstamos de Crédito Externo",
                "descripcion" => "Financiamiento que obtienen las Instituciones Públicas por préstamos de corto o largo plazo que\nprovienen de “Crédito Externo”.",
                "fk_id_clasificador" => 5
            ],
            [
                "sigla" => "DGCI -CTB",
                "codigo" => "519",
                "denominacion" => "Dir. General de Cooperación Internacional /Coop. Técnica Belga",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "ASDI",
                "codigo" => "520",
                "denominacion" => "Agencia Sueca para el Desarrollo Internacional",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "CID",
                "codigo" => "521",
                "denominacion" => "Corporación Internacional de Desarrollo",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "CIID",
                "codigo" => "523",
                "denominacion" => "Agencia Canadiense para el Desarrollo Internacional Regional",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "DON-EXT",
                "codigo" => "80",
                "denominacion" => "Donación Externa",
                "descripcion" => "Fuente de Financiamiento que obtienen las instituciones de los Órganos Ejecutivo, Legislativo, Judicial y\nElectoral, Control de Defensa de la Sociedad y del Estado, Descentralizadas, Entidades Territoriales\nAutónomas, Universidades Públicas, Empresas Públicas, Entidades Financieras Bancarias y no Bancarias,\nEntidades Públicas de la Seguridad Social, por concepto de donaciones externas, monetizable y no\nmonetizable, que provienen de países y organismos internacionales.",
                "fk_id_clasificador" => 5
            ],
            [
                "sigla" => "TRANSF-DEXT",
                "codigo" => "44",
                "denominacion" => "Transferencias de Donación Externa",
                "descripcion" => "Financiamiento que obtienen u otorgan las Instituciones Públicas por transferencias que provienen de\n“Donación Externa”.",
                "fk_id_clasificador" => 5
            ],
            [
                "sigla" => "PREST-DEXT",
                "codigo" => "94",
                "denominacion" => "Préstamos de Donación Externa",
                "descripcion" => "Financiamiento que obtienen las Instituciones Públicas por préstamos de corto o largo plazo que\nprovienen de “Donación Externa”.",
                "fk_id_clasificador" => 5
            ],
            [
                "sigla" => "DON-INT",
                "codigo" => "87",
                "denominacion" => "Donación Interna",
                "descripcion" => "Fuente de Financiamiento que obtienen las instituciones de los Órganos Ejecutivo, Legislativo, Judicial y\nElectoral, Control de Defensa de la Sociedad y del Estado, Descentralizadas, Entidades Territoriales\nAutónomas, Universidades Públicas, Empresas Públicas, Entidades Financieras Bancarias y no Bancarias,\nEntidades Públicas de la Seguridad Social, por concepto de donaciones internas monetizable y no\nmonetizable, que provienen de instituciones privadas, personas naturales y/o jurídicas dentro el territorio\nnacional.",
                "fk_id_clasificador" => 5
            ],
            [
                "sigla" => "TRANSF-DINT",
                "codigo" => "47",
                "denominacion" => "Transferencia de Donación Interna",
                "descripcion" => "Financiamiento que obtienen u otorgan las Instituciones Públicas por transferencias que provienen de\n“Donación Interna”.",
                "fk_id_clasificador" => 5
            ],
            [
                "sigla" => "PREST-DINT",
                "codigo" => "97",
                "denominacion" => "Préstamos de Donación Interna",
                "descripcion" => "Financiamiento que obtienen las Instituciones Públicas por préstamos de corto o largo plazo que\nprovienen de “Donación Interna”.",
                "fk_id_clasificador" => 5
            ],
            [
                "sigla" => "CREDINT",
                "codigo" => "90",
                "denominacion" => "Crédito Interno",
                "descripcion" => "Financiamiento que obtiene el Tesoro General de la Nación por concepto de préstamos del Banco Central\nde Bolivia y de otras instituciones financieras privadas nacionales, autorizadas por norma expresa y\nmediante la suscripción de un convenio de crédito; incluye la colocación de títulos y valores que realiza el\nTesoro General de la Nación en el ámbito nacional.",
                "fk_id_clasificador" => 5
            ],
            [
                "sigla" => "TRANSF-CREI",
                "codigo" => "45",
                "denominacion" => "Transferencias de Crédito Interno",
                "descripcion" => "Financiamiento que obtienen u otorgan las Instituciones Públicas por transferencias que provienen de la\nfuente de financiamiento “Crédito Interno”.",
                "fk_id_clasificador" => 5
            ],
            [
                "sigla" => "PREST-CREI",
                "codigo" => "95",
                "denominacion" => "Préstamos de Crédito Interno",
                "descripcion" => "Financiamiento que obtienen las Instituciones Públicas por préstamos de corto o largo plazo que\nprovienen de la fuente de financiamiento “Crédito Interno”.",
                "fk_id_clasificador" => 5
            ],
            [
                "sigla" => "OFI",
                "codigo" => "0",
                "denominacion" => "ORGANISMOS FINANCIADORES INTERNOS",
                "descripcion" => "Los Organismos Financiadores Internos tienen el propósito de identificar los tipos específicos de\nfinanciamiento del Gobierno.\nEl Clasificador de Organismos Financiadores Internos se utiliza en el presupuesto de gastos asociado,\nbásicamente, a las fuentes de financiamiento.",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "GOB",
                "codigo" => "0",
                "denominacion" => "Gobierno",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "TGN",
                "codigo" => "111",
                "denominacion" => "Tesoro General de la Nación",
                "descripcion" => "Fondos que se originan principalmente de recaudaciones tributarias, participación en regalías,\ntransferencias, rendimiento de activos, saldo disponible de la gestión anterior y otros ingresos.",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "TGN-P",
                "codigo" => "112",
                "denominacion" => "Tesoro General de la Nación - Papeles",
                "descripcion" => "Define el monto del financiamiento en “Papeles” que corresponde a la fuente de financiamiento “Tesoro\nGeneral de la Nación”.",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "TGN-CT",
                "codigo" => "113",
                "denominacion" => "Tesoro General de la Nación - Coparticipación Tributaria",
                "descripcion" => "Define el monto de ingresos de la fuente de financiamiento “Tesoro General de la Nación” que se destina\ncomo coparticipación tributaria de los Gobiernos Autónomos Municipales e Indígena Originario\nCampesino y Universidades Públicas de acuerdo a normativa vigente. Se asocia a la fuente de\nfinanciamiento “Tesoro General de la Nación”.",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "RECON",
                "codigo" => "114",
                "denominacion" => "Recursos de Contravalor",
                "descripcion" => "Fondos que se originan en convenios de cooperación financiera (Donaciones y Préstamos) de Organismos\nInternacionales o Gobiernos Extranjeros y que conforman recursos de contrapartida asociados a la fuente\nde financiamiento “Tesoro General de la Nación”.",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "TGN-FCOMP",
                "codigo" => "116",
                "denominacion" => "Tesoro General de la Nación - Fondo de Compensación Departamental",
                "descripcion" => "Fondo compensatorio que se constituyen con el 10% de los recursos del Impuesto Especial a los\nhidrocarburos y sus Derivados para los departamentos que estén por debajo del promedio nacional de\nregalías departamentales por habitante establecido en normativa vigente. Se asocia a la fuente de\nfinanciamiento “Tesoro General de la Nación”.",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "TGN-IEHD",
                "codigo" => "117",
                "denominacion" => "Tesoro General de la Nación - Impuesto Especial a los Hidrocarburos y sus Derivados",
                "descripcion" => "Define el monto de los ingresos por coparticipación del Impuesto Especial a los Hidrocarburos y sus\nDerivados para los Gobiernos Autónomos Departamentales de acuerdo a normativa vigente. Este\nfinanciamiento está asociado a la fuente de financiamiento “Tesoro General de la Nación”.",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "TGN-IDH",
                "codigo" => "119",
                "denominacion" => "Tesoro General de la Nación - Impuesto Directo a los Hidrocarburos",
                "descripcion" => "Define el monto de los ingresos por Impuesto Directo a los Hidrocarburos de acuerdo a la Ley de\nHidrocarburos. Este financiamiento está asociado a la fuente de financiamiento “Tesoro General de la\nNación”.",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "TGN-IPJ",
                "codigo" => "120",
                "denominacion" => "Tesoro General de la Nación - Impuesto a la Participación en Juegos",
                "descripcion" => "Define el monto de ingresos por el derecho de participar en distintas modalidades de juego, conforme la\nLey de Juego de Lotería y Azar, está asociado a la fuente de financiamiento “Tesoro General de la Nación”.",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "TGN-PPET",
                "codigo" => "121",
                "denominacion" => "Tesoro General de la Nación - Patentes Petroleras",
                "descripcion" => "Define el monto de ingresos provenientes por el pago de patentes petroleras en cumplimiento a la Ley de\nHidrocarburos y el Decreto que reglamenta estas transferencias, está asociado a la fuente de\nfinanciamiento “Tesoro General de la Nación”.",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "OT-GOB",
                "codigo" => "129",
                "denominacion" => "Otros Organismos Financiadores del Gobierno",
                "descripcion" => "Define el monto de ingresos distintos de las recaudaciones tributarias correspondientes a operaciones\nque realiza el Tesoro General de la Nación. Se asocia a la fuente de financiamiento “TGN otros Ingresos”.",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "TGN-OT",
                "codigo" => "0",
                "denominacion" => "TGN Otros Ingresos",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "ORG-RECESP",
                "codigo" => "0",
                "denominacion" => "Organismos de Recursos Específicos",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "RECESP",
                "codigo" => "210",
                "denominacion" => "Recursos Específicos de los Gobiernos Autónomos Municipales e Indígena Originario Campesino",
                "descripcion" => "Define el monto del financiamiento que se origina por la realización de actividades propias de la\nAdministración Municipal. Se asocia a la fuente de financiamiento “Recursos Específicos”.",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "ICI",
                "codigo" => "525",
                "denominacion" => "Instituto de Cooperación Iberoamericana",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "NORAD",
                "codigo" => "527",
                "denominacion" => "Agencia Noruega para el Desarrollo Internacional",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "AECID",
                "codigo" => "528",
                "denominacion" => "Agencia Española de Cooperación Internacional",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "BRA",
                "codigo" => "544",
                "denominacion" => "Brasil",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "REG",
                "codigo" => "220",
                "denominacion" => "Regalías",
                "descripcion" => "Define el monto del financiamiento por regalías establecidas en la normativa vigente que se origina por\nla realización de actividades de explotación de recursos naturales renovables y no renovables. Se asocia\na la fuente de financiamiento “Tesoro General de la Nación” en el caso de Regalías Nacionales y a la fuente\n“Recursos Específicos” en el caso de las Regalías de las Entidades Territoriales Autónomas.",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "OTPRO",
                "codigo" => "230",
                "denominacion" => "Otros Recursos Específicos",
                "descripcion" => "Define el monto del financiamiento por otros recursos correspondientes a la fuente de financiamiento\n“Recursos Específicos”.",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "OFE",
                "codigo" => "0",
                "denominacion" => "ORGANISMOS FINANCIADORES EXTERNOS",
                "descripcion" => "Los Organismos Financiadores Externos tienen el propósito de identificar a los organismos internacionales\ny países extranjeros que conceden préstamos y/o donaciones.\nEl Clasificador de Organismos Financiadores Externos se utiliza en el presupuesto de gastos asociado,\nbásicamente, a las fuentes de financiamiento. Tiene la siguiente desagregación:\n· Organismos Multilaterales\n· Organismos Bilaterales\n· Gobiernos Extranjeros\n· Otros Organismos Financiadores Externos.",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "MULT",
                "codigo" => "0",
                "denominacion" => "Organismos Multilaterales",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "ALADI",
                "codigo" => "311",
                "denominacion" => "Asociación Latinoamericana de Integración",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "CIAT",
                "codigo" => "312",
                "denominacion" => "Centro Interamericano de Agricultura Tropical",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "CEPAL",
                "codigo" => "313",
                "denominacion" => "Comisión Económica para América Latina",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "CAF",
                "codigo" => "314",
                "denominacion" => "Corporación Andina de Fomento",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "FAR",
                "codigo" => "315",
                "denominacion" => "Fondo Andino de Reserva",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "IICA",
                "codigo" => "316",
                "denominacion" => "Instituto Interamericano de Cooperación Agrícola",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "CAN",
                "codigo" => "317",
                "denominacion" => "Comunidad Andina de Naciones",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "OEA",
                "codigo" => "318",
                "denominacion" => "Organización de los Estados Americanos",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "OLADE",
                "codigo" => "319",
                "denominacion" => "Organización Latinoamericana de Energía",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "OPS",
                "codigo" => "321",
                "denominacion" => "Organización Panamericana de Salud",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "SELA",
                "codigo" => "322",
                "denominacion" => "Sistema Económico Latinoamericano",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "FPDPI",
                "codigo" => "323",
                "denominacion" => "Fondo de Desarrollo de Pueblos Indígenas de América Latina y El Caribe",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "HABITAT",
                "codigo" => "341",
                "denominacion" => "Centro NN.UU. para los Asentamientos Humanos",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "UNCTAD",
                "codigo" => "342",
                "denominacion" => "Conferencia de las NN.UU. sobre Comercio y Desarrollo",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "DTCD",
                "codigo" => "343",
                "denominacion" => "Departamento de Cooperación Técnica para el Desarrollo",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "UNICEF",
                "codigo" => "344",
                "denominacion" => "Fondo de las NN.UU. para la Infancia",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "UNFPA",
                "codigo" => "345",
                "denominacion" => "Fondo NN.UU. para la Actividad en Materia de Población",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "FIDA",
                "codigo" => "346",
                "denominacion" => "Fondo Internacional de Desarrollo Agrícola",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "UNITAR",
                "codigo" => "347",
                "denominacion" => "Instituto de NN.UU. para Formación Profesional e Investigación",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "OACI",
                "codigo" => "348",
                "denominacion" => "Organización de Aviación Civil Internacional",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "ONUDI",
                "codigo" => "349",
                "denominacion" => "Organización de las NN.UU. para el Desarrollo Industrial",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "FAO",
                "codigo" => "351",
                "denominacion" => "Organización de las NN.UU. para la Agricultura y la Alimentación",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "UNESCO",
                "codigo" => "352",
                "denominacion" => "Organización de las NN.UU. para la Educación, Ciencia y la Cultura",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "OIEA",
                "codigo" => "353",
                "denominacion" => "Organización Internacional de Energía Atómica",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "OIT",
                "codigo" => "354",
                "denominacion" => "Organización Internacional del Trabajo",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "OMS",
                "codigo" => "355",
                "denominacion" => "Organización Mundial de la Salud",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "OMM",
                "codigo" => "356",
                "denominacion" => "Organización Mundial de Meteorología",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "PNUD",
                "codigo" => "357",
                "denominacion" => "Programa de las NN.UU. para el Desarrollo",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "PNUMA",
                "codigo" => "358",
                "denominacion" => "Programa de NN.UU. para el Medio Ambiente",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "UIT",
                "codigo" => "359",
                "denominacion" => "Unión Internacional de Telecomunicaciones",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "UPU",
                "codigo" => "361",
                "denominacion" => "Unión Postal Universal",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "UNU",
                "codigo" => "362",
                "denominacion" => "Universidad de las Naciones Unidas",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "UE",
                "codigo" => "371",
                "denominacion" => "Unión Europea",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "CAME",
                "codigo" => "372",
                "denominacion" => "Consejo de Asistencia Mutua Económica",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "OPEC",
                "codigo" => "373",
                "denominacion" => "Organization of the Petroleum Exporting Countries",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "PMA",
                "codigo" => "374",
                "denominacion" => "Programa Mundial de Alimentos",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "OIM",
                "codigo" => "375",
                "denominacion" => "Organización Internacional para las Migraciones",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "FNUDC",
                "codigo" => "376",
                "denominacion" => "Fondo de NNUU para el Desarrollo y la Capitalización",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "UNDCP",
                "codigo" => "377",
                "denominacion" => "Programa de las NNUU para la Fiscalización Internacional de Drogas",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "UNIFEM",
                "codigo" => "378",
                "denominacion" => "Fondo de las NNUU para el Desarrollo de la Mujer",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "UNRFNRE",
                "codigo" => "379",
                "denominacion" => "Fondo Rotativo de las NNUU para la Exploración de Recursos Naturales",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "NFD",
                "codigo" => "384",
                "denominacion" => "Fondo Nórdico para el Desarrollo",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "OIMT",
                "codigo" => "386",
                "denominacion" => "Organización Internacional de Maderas Tropicales",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "BID",
                "codigo" => "411",
                "denominacion" => "Banco Interamericano de Desarrollo",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "BIRF",
                "codigo" => "412",
                "denominacion" => "Banco Internacional de Reconstrucción y Fomento",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "FONPLATA",
                "codigo" => "413",
                "denominacion" => "Fondo Financiero para el Desarrollo de la Cuenca del Plata",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "FMI",
                "codigo" => "414",
                "denominacion" => "Fondo Monetario Internacional",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "AIF",
                "codigo" => "415",
                "denominacion" => "Agencia Internacional de Fomento (BM)",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "BIAPE",
                "codigo" => "416",
                "denominacion" => "Banco Interamericano de Ahorro - Préstamo",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "CFI",
                "codigo" => "420",
                "denominacion" => "Corporación Financiera Internacional (BM)",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "OMGI",
                "codigo" => "421",
                "denominacion" => "Organismo Multilateral de Garantía de Inversiones (BM)",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "FOMIN",
                "codigo" => "522",
                "denominacion" => "Fondo Multilateral de Inversiones (BID)",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "GEF",
                "codigo" => "524",
                "denominacion" => "Fondo Global del Medio Ambiente (BM)",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "IDF",
                "codigo" => "526",
                "denominacion" => "Fondo Institucional de Desarrollo",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "EXIMBANK-CH",
                "codigo" => "730",
                "denominacion" => "Banco de Importaciones - Exportaciones China",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "BDC",
                "codigo" => "731",
                "denominacion" => "Banco de Desarrollo de China",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "BEI",
                "codigo" => "732",
                "denominacion" => "Banco Europeo de Inversiones",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "KOICA",
                "codigo" => "733",
                "denominacion" => "Korea International Cooperation Agency",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "UNODC",
                "codigo" => "734",
                "denominacion" => "Prog. de NNUU para la Fiscalización Internacional de Drogas",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "OFID",
                "codigo" => "735",
                "denominacion" => "The OPEC Fund for International Development",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "FVC",
                "codigo" => "736",
                "denominacion" => "Fondo Verde para el Clima",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "OT-MUL",
                "codigo" => "997",
                "denominacion" => "Otros Organismos Financiadores Multilaterales",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "BILAT",
                "codigo" => "0",
                "denominacion" => "Organismos Bilaterales",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "CET",
                "codigo" => "6 1",
                "denominacion" => "CERCADO",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CH-TAI",
                "codigo" => "549",
                "denominacion" => "República China Nacionalista - Taiwán",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "DIN",
                "codigo" => "551",
                "denominacion" => "Dinamarca",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "ESP",
                "codigo" => "552",
                "denominacion" => "España",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "USA",
                "codigo" => "553",
                "denominacion" => "Estados Unidos de América",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "FRA",
                "codigo" => "554",
                "denominacion" => "Francia",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "G-BR",
                "codigo" => "555",
                "denominacion" => "Gran Bretaña",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "HOL",
                "codigo" => "556",
                "denominacion" => "Holanda",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "HUN",
                "codigo" => "557",
                "denominacion" => "Hungría",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "ISR",
                "codigo" => "558",
                "denominacion" => "Israel",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "ITA",
                "codigo" => "559",
                "denominacion" => "Italia",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "JAP",
                "codigo" => "561",
                "denominacion" => "Japón",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "NOR",
                "codigo" => "562",
                "denominacion" => "Noruega",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "PERU",
                "codigo" => "563",
                "denominacion" => "Perú",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "RUM",
                "codigo" => "564",
                "denominacion" => "Rumania",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "SUE",
                "codigo" => "565",
                "denominacion" => "Suecia",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "SUI",
                "codigo" => "566",
                "denominacion" => "Suiza",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "RUSIA",
                "codigo" => "567",
                "denominacion" => "Federación de Rusia",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "VEN",
                "codigo" => "568",
                "denominacion" => "República Bolivariana de Venezuela",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "POL",
                "codigo" => "569",
                "denominacion" => "Polonia",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "AUST",
                "codigo" => "571",
                "denominacion" => "Austria",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "SUDAF",
                "codigo" => "572",
                "denominacion" => "Sudáfrica",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "PAN",
                "codigo" => "573",
                "denominacion" => "Panamá",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "PORT",
                "codigo" => "574",
                "denominacion" => "Portugal",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "CHI",
                "codigo" => "575",
                "denominacion" => "República de Chile",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "MEX",
                "codigo" => "576",
                "denominacion" => "México",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "URU",
                "codigo" => "577",
                "denominacion" => "República Oriental del Uruguay",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "PARA",
                "codigo" => "578",
                "denominacion" => "Paraguay",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "FILIP",
                "codigo" => "579",
                "denominacion" => "Filipinas",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "COL",
                "codigo" => "580",
                "denominacion" => "Colombia",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "ECU",
                "codigo" => "581",
                "denominacion" => "Ecuador",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "CU",
                "codigo" => "582",
                "denominacion" => "Cuba",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "OT-G-EXT",
                "codigo" => "639",
                "denominacion" => "Otros Gobiernos Extranjeros",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "OTR.EXT",
                "codigo" => "0",
                "denominacion" => "Otros Organismos Financiadores Externos",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "DON-HIPC",
                "codigo" => "115",
                "denominacion" => "Donaciones - HIPC II",
                "descripcion" => "Fondos que se originan por concepto de alivio de deuda externa en el marco de la iniciativa para Países\nAltamente Endeudados (HIPC) y que estarán destinados a gastos relacionados con sectores sociales de\nacuerdo a lo establecido en la norma legal específica.",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "CARE",
                "codigo" => "641",
                "denominacion" => "Care",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "CARITAS",
                "codigo" => "642",
                "denominacion" => "Caritas",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "PLAN-INTER",
                "codigo" => "643",
                "denominacion" => "Plan Internacional",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "FAN",
                "codigo" => "644",
                "denominacion" => "Fundación Amigos de la Naturaleza",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "OT-NOGUB",
                "codigo" => "669",
                "denominacion" => "Otros Organismos no Gubernamentales",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "BAN-PRI",
                "codigo" => "671",
                "denominacion" => "Bancos Privados",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "PROV",
                "codigo" => "672",
                "denominacion" => "Proveedores",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "ND-EXT",
                "codigo" => "719",
                "denominacion" => "Organismos Financiadores Externos no Determinados",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "BASK-FUN",
                "codigo" => "720",
                "denominacion" => "Basket Funding",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "OT-EXT",
                "codigo" => "729",
                "denominacion" => "Otros Organismos Financiadores Externos",
                "descripcion" => "-",
                "fk_id_clasificador" => 6
            ],
            [
                "sigla" => "AGROP",
                "codigo" => "1",
                "denominacion" => "AGROPECUARIO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AGRIC",
                "codigo" => "1 1",
                "denominacion" => "AGRICOLA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AGR01",
                "codigo" => "1 1 1",
                "denominacion" => "INVESTIGACION AGRICOLA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AGR02",
                "codigo" => "1 1 2",
                "denominacion" => "SANIDAD VEGETAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AGR03",
                "codigo" => "1 1 3",
                "denominacion" => "INFRAESTRUCTURA DE APOYO AGRICOLA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AGR04",
                "codigo" => "1 1 4",
                "denominacion" => "EXTENSION Y CAPACITACION",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AGR05",
                "codigo" => "1 1 5",
                "denominacion" => "EQUIPAMIENTO APOYO AGRICOLA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AGR06",
                "codigo" => "1 1 6",
                "denominacion" => "FOMENTO A LA PRODUCCION AGRICOLA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "PECUA",
                "codigo" => "1 2",
                "denominacion" => "PECUARIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "PEC01",
                "codigo" => "1 2 1",
                "denominacion" => "INVESTIGACION PECUARIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "PEC02",
                "codigo" => "1 2 2",
                "denominacion" => "EXTENSION Y CAPACITACION PECUARIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "PEC03",
                "codigo" => "1 2 3",
                "denominacion" => "FOMENTO GANADERO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "PEC04",
                "codigo" => "1 2 4",
                "denominacion" => "SANIDAD ANIMAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "PEC05",
                "codigo" => "1 2 5",
                "denominacion" => "INFRAESTRUCTURA DE APOYO PECUARIO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "PEC06",
                "codigo" => "1 2 6",
                "denominacion" => "MEJORAMIENTO GENÉTICO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "PEC07",
                "codigo" => "1 2 7",
                "denominacion" => "PRADERAS, FORRAJES Y NUTRICIÓN ANIMAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "PEC08",
                "codigo" => "1 2 8",
                "denominacion" => "DESARROLLO APICOLA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "PEC09",
                "codigo" => "1 2 9",
                "denominacion" => "DESARROLLO AVICOLA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "PEC10",
                "codigo" => "1 2 10",
                "denominacion" => "EQUIPAMIENTO PARA APOYO PECUARIO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "SILVI",
                "codigo" => "1 3",
                "denominacion" => "DESARROLLO PESQUERO Y ACUICOLA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "SIL01",
                "codigo" => "1 3 1",
                "denominacion" => "PESCA EN CAUSES NATURALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "SIL02",
                "codigo" => "1 3 2",
                "denominacion" => "AGROSILVOPASTORIL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "SIL03",
                "codigo" => "1 3 3",
                "denominacion" => "ACUICULTURA (CRIANZA ARTIFICIAL)",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "SIL04",
                "codigo" => "1 3 4",
                "denominacion" => "INFRAESTRUCTURA DE APOYO EN ACUICULTURA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INVDP",
                "codigo" => "1 3 5",
                "denominacion" => "INVESTIGACIÓN DESARROLLO PESQUERO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "SEGAL",
                "codigo" => "1 4",
                "denominacion" => "SEGURIDAD Y SOBERANIA ALIMENTARIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "SEG01",
                "codigo" => "1 4 1",
                "denominacion" => "SEGURIDAD Y SOBERANIA ALIMENTARIA AGRICOLA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "SEG02",
                "codigo" => "1 4 2",
                "denominacion" => "SEGURIDAD Y SOBERANIA ALIMENTARIA PECUARIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INVSSA",
                "codigo" => "1 4 3",
                "denominacion" => "INVESTIGACION SEGURIDAD Y SOBERANIA ALIMENTARIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "RIE",
                "codigo" => "1 5",
                "denominacion" => "RIEGO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "RIE01",
                "codigo" => "1 5 1",
                "denominacion" => "CONSTRUCCIÓN DE SISTEMAS DE RIEGO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "RIE02",
                "codigo" => "1 5 2",
                "denominacion" => "MEJORAMIENTO Y AMPLIACIÓN DE SISTEMA DE RIEGO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "RIE03",
                "codigo" => "1 5 3",
                "denominacion" => "REHABILITACIÓN DE SISTEMAS DE RIEGO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "RIE04",
                "codigo" => "1 5 4",
                "denominacion" => "OTROS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "RIE05",
                "codigo" => "1 5 5",
                "denominacion" => "MICRORIEGO Y OTROS (ATAJADOS, RESERVORIOS Y PERFORACIÓN DE POZOS)",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "RIE06",
                "codigo" => "1 5 6",
                "denominacion" => "DRENAJES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTRIE",
                "codigo" => "1 5 7",
                "denominacion" => "OTROS RIEGO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "RIE08",
                "codigo" => "1 5 8",
                "denominacion" => "INVESTIGACIÓN RIEGO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MAGRP",
                "codigo" => "1 6",
                "denominacion" => "MULTIPROGRAMA AGROPECUARIO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MULT01",
                "codigo" => "1 6 1",
                "denominacion" => "MULTIPROGRAMA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OAGR",
                "codigo" => "1 7",
                "denominacion" => "OTROS AGROPECUARIO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTR01",
                "codigo" => "1 7 1",
                "denominacion" => "SANEAMIENTO TITULACIÓN Y DISTRIBUCIÓN DE TIERRAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTR02",
                "codigo" => "1 7 2",
                "denominacion" => "OTROS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MINER",
                "codigo" => "2",
                "denominacion" => "MINERO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MIN",
                "codigo" => "2 1",
                "denominacion" => "DESARROLLO MINERO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MIN01",
                "codigo" => "2 1 1",
                "denominacion" => "PROSPECCION Y EXPLORACION MINERA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MIN02",
                "codigo" => "2 1 2",
                "denominacion" => "EXPLOTACIÓN Y PRODUCCIÓN DE MINERALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MIN03",
                "codigo" => "2 1 3",
                "denominacion" => "COMERCIALIZACIÓN DE MINERALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MIN05",
                "codigo" => "2 1 5",
                "denominacion" => "INVESTIGACIÓN MINERA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MIN06",
                "codigo" => "2 1 6",
                "denominacion" => "TRATAMIENTO DE RESIDUOS MINEROS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MIN07",
                "codigo" => "2 1 7",
                "denominacion" => "REMEDIACIÓN DE PASIVOS AMBIENTALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTRMIN",
                "codigo" => "2 1 8",
                "denominacion" => "OTROS MINERIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MIN09",
                "codigo" => "2 1 9",
                "denominacion" => "CONCENTRACION, FUNDICION Y REFINACION DE MINERALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MIN10",
                "codigo" => "2 1 10",
                "denominacion" => "ASISTENCIA Y CAPACITACION EN MINERIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MIN11",
                "codigo" => "2 1 11",
                "denominacion" => "INVESTIGACIÓN MINERA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INDUS",
                "codigo" => "3",
                "denominacion" => "INDUSTRIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AGROI",
                "codigo" => "3 1",
                "denominacion" => "AGROINDUSTRIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AGRO01",
                "codigo" => "3 1 1",
                "denominacion" => "TRANSFORMACIÓN DE ALIMENTOS Y BEBIDAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AGRO02",
                "codigo" => "3 1 2",
                "denominacion" => "COMERCIALIZACIÓN DE ALIMENTOS Y BEBIDAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AGRO03",
                "codigo" => "3 1 3",
                "denominacion" => "FOMENTO A LA PRODUCCION AGROINDUSTRIAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INMAN",
                "codigo" => "3 2",
                "denominacion" => "INDUSTRIA MANUFACTURERA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INMA01",
                "codigo" => "3 2 1",
                "denominacion" => "TRANSFORMACIÓN DE TEXTILES Y PRENDAS DE VESTIR",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INMA02",
                "codigo" => "3 2 2",
                "denominacion" => "TRANSFORMACIÓN DE MUEBLES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INMA03",
                "codigo" => "3 2 3",
                "denominacion" => "TRANSFORMACIÓN DE CUEROS Y CALZADOS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INMA04",
                "codigo" => "3 2 4",
                "denominacion" => "TRANSFORMACIÓN DE PRODUCTOS ELABORADOS DE METAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INMA05",
                "codigo" => "3 2 5",
                "denominacion" => "COMERCIALIZACIÓN DE MANUFACTURAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INMA06",
                "codigo" => "3 2 6",
                "denominacion" => "FOMENTO DE PROMOCIÓN DE LA PRODUCCION MANUFACTURERA Y MICROEMPRESA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INMA07",
                "codigo" => "3 2 7",
                "denominacion" => "OTRAS MANUFACTURAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MGRP",
                "codigo" => "3 3",
                "denominacion" => "MULTIPROGRAMA INDUSTRIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MULT02",
                "codigo" => "3 3 1",
                "denominacion" => "MULTIPROGRAMA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTRIND",
                "codigo" => "3 4",
                "denominacion" => "OTROS INDUSTRIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTR03",
                "codigo" => "3 4 1",
                "denominacion" => "OTROS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTRAR",
                "codigo" => "3 4 2",
                "denominacion" => "OTROS ARTESANIAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INVIND",
                "codigo" => "3 5",
                "denominacion" => "INVESTIGACION INDUSTRIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INVIND01",
                "codigo" => "3 5 1",
                "denominacion" => "INVESTIGACION INDUSTRIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "HIDRO",
                "codigo" => "4",
                "denominacion" => "HIDROCARBUROS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "HID",
                "codigo" => "4 1",
                "denominacion" => "HIDROCARBUROS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "HID01",
                "codigo" => "4 1 1",
                "denominacion" => "PROSPECCION Y EXPLORACION DE HIDROCARBUROS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "HID02",
                "codigo" => "4 1 2",
                "denominacion" => "EXPLOTACION O PRODUCCION DE HIDROCARBUROS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "HID03",
                "codigo" => "4 1 3",
                "denominacion" => "TRANSPORTE DE HIDROCARBUROS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "HID04",
                "codigo" => "4 1 4",
                "denominacion" => "COMERCIALIZARON DE HIDROCARBUROS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "HID05",
                "codigo" => "4 1 5",
                "denominacion" => "INDUSTRIALIZARON DE HIDROCARBUROS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "HID06",
                "codigo" => "4 1 6",
                "denominacion" => "REDES DE DISTRIBUCIÓN DE GAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "HID07",
                "codigo" => "4 1 7",
                "denominacion" => "REMEDIACIÓN AMBIENTAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTRHID",
                "codigo" => "4 1 8",
                "denominacion" => "OTROS HIDROCARBUROS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "ENERG",
                "codigo" => "5",
                "denominacion" => "ENERGIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "ENELC01",
                "codigo" => "5 1",
                "denominacion" => "ENERGIA ELECTRICA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "ENELC02",
                "codigo" => "5 1 1",
                "denominacion" => "GENERACION DE ENERGIA ELECTRICA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "ENELC03",
                "codigo" => "5 1 2",
                "denominacion" => "TRANSMISION DE ENERGIA ELECTRICA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "ENELC04",
                "codigo" => "5 1 3",
                "denominacion" => "DISTRIBUCIÓN DE ENERGÍA ELECTRICA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "ENELC05",
                "codigo" => "5 1 4",
                "denominacion" => "ELECTRIFICARON RURAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTRENEL",
                "codigo" => "5 2",
                "denominacion" => "ENERGIAS ALTERNATIVAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "ENELALT",
                "codigo" => "5 2 1",
                "denominacion" => "EOLICA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "ENEEO",
                "codigo" => "5 2 2",
                "denominacion" => "GEOTERMICA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "ENEGEO",
                "codigo" => "5 2 3",
                "denominacion" => "FOTOVOLTAICA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "ENEBIO",
                "codigo" => "5 2 4",
                "denominacion" => "BIOMASA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "ENENU",
                "codigo" => "5 2 5",
                "denominacion" => "NUCLEAR",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTENE",
                "codigo" => "5 3",
                "denominacion" => "OTROS ENERGÍA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTR04",
                "codigo" => "5 3 1",
                "denominacion" => "OTROS ENERGÍA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MENER",
                "codigo" => "5 4",
                "denominacion" => "MULTIPROGRAMA ENERGÍA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MULT03",
                "codigo" => "5 4 1",
                "denominacion" => "MULTIPROGRAMA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INVDEN",
                "codigo" => "5 5",
                "denominacion" => "INVESTIGACIÓN ENERGÍA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INVDEN01",
                "codigo" => "5 5 1",
                "denominacion" => "INVESTIGACIÓN EN DESARROLLO DE LA ENERGÍA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "TRANS",
                "codigo" => "6",
                "denominacion" => "TRANSPORTES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CAM",
                "codigo" => "6 1",
                "denominacion" => "CAMINERO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CAM01",
                "codigo" => "6 1 1",
                "denominacion" => "CONSTRUCCION CARRETERAS PAVIMENTADAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CAM02",
                "codigo" => "6 1 2",
                "denominacion" => "CONSTRUCCION CARRETERAS NO PAVIMENTADAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CAM03",
                "codigo" => "6 1 3",
                "denominacion" => "MEJORAMIENTO DE CARRETERAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CAM04",
                "codigo" => "6 1 4",
                "denominacion" => "MANTENIMIENTO DE CARRETERAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CAM05",
                "codigo" => "6 1 5",
                "denominacion" => "REHABILITACIÓN DE CARRETERAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CAM06",
                "codigo" => "6 1 6",
                "denominacion" => "APERTURA DE CAMINOS VECINALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CAM07",
                "codigo" => "6 1 7",
                "denominacion" => "MEJORAMIENTO DE CAMINOS VECINALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CAM08",
                "codigo" => "6 1 8",
                "denominacion" => "CONSTRUCCION DE PUENTES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CAM09",
                "codigo" => "6 1 9",
                "denominacion" => "REHABILITACIÓN DE PUENTES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CAM10",
                "codigo" => "6 1 10",
                "denominacion" => "SERVICIOS POR TRANSPORTE TERRESTRE",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CAM11",
                "codigo" => "6 1 11",
                "denominacion" => "CONTROL Y SEGURIDAD DEL TRAFICO TERRESTRE",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CAM12",
                "codigo" => "6 1 12",
                "denominacion" => "MANTENIMIENTO DE PUENTES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "FER",
                "codigo" => "6 2",
                "denominacion" => "FERROVIARIO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "FER01",
                "codigo" => "6 2 1",
                "denominacion" => "CONSTRUCCIÓN DE INFRAESTRUCTURA FERROVIARIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "FER02",
                "codigo" => "6 2 2",
                "denominacion" => "EQUIPAMIENTO DE TRACCION Y MATERIAL RODANTE",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "FER03",
                "codigo" => "6 2 3",
                "denominacion" => "MEJORAMIENTO DE INFRAESTRUCTURA FERROVIARIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "FER04",
                "codigo" => "6 2 4",
                "denominacion" => "REHABILITARON DE LINEAS FERREAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "FER05",
                "codigo" => "6 2 5",
                "denominacion" => "SERVICIOS FERROVIARIOS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "FER06",
                "codigo" => "6 2 6",
                "denominacion" => "CONTROL Y SEGURIDAD DEL TRANSPORTE FERROVIARIO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AER",
                "codigo" => "6 3",
                "denominacion" => "AÉREO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AER01",
                "codigo" => "6 3 1",
                "denominacion" => "CONSTRUCCION DE INFRAESTRUCTURA AEROPORTUARIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AER02",
                "codigo" => "6 3 2",
                "denominacion" => "EQUIPAMIENTO PARA LA NAVEGACIÓN Y SERVICIOS AUXILIARES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AER03",
                "codigo" => "6 3 3",
                "denominacion" => "MEJORAMIENTO DE INFRAESTRUCTURA AEROPORTUARIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AER04",
                "codigo" => "6 3 4",
                "denominacion" => "REHABILITACIÓN DE INFRAESTRUCTURA AEROPORTUARIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AER05",
                "codigo" => "6 3 5",
                "denominacion" => "MANTENIMIENTO DE INFRAESTRUCTURA AEROPORTUARIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AER06",
                "codigo" => "6 3 6",
                "denominacion" => "CONSTRUCCION DE PISTAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AER07",
                "codigo" => "6 3 7",
                "denominacion" => "CONSTRUCCION DE TERMINALES AEREAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AER08",
                "codigo" => "6 3 8",
                "denominacion" => "MEJORAMIENTO Y MANTENIMIENTO DE AERONAVES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AER09",
                "codigo" => "6 3 9",
                "denominacion" => "SERVICIOS DE TRANSPORTE AÉREO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "TRJ",
                "codigo" => "6 1 1",
                "denominacion" => "Tarija",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "AER10",
                "codigo" => "6 3 10",
                "denominacion" => "CONTROL Y SEGURIDAD DEL TRANSPORTE AEREO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "HIDROV",
                "codigo" => "6 4",
                "denominacion" => "TRANSPORTE FLUVIAL Y LACUSTRE",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "HIDR01",
                "codigo" => "6 4 1",
                "denominacion" => "CONSTRUCCION Y EQUIPAMIENTO DE PUERTOS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "HIDR02",
                "codigo" => "6 4 2",
                "denominacion" => "MEJORAS PARA LA NAVEGACION",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "HIDR03",
                "codigo" => "6 4 3",
                "denominacion" => "CONSTRUCCIÓN DE INFRAESTRUCTURA FLUVIAL Y LACUSTRE",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "HIDR04",
                "codigo" => "6 4 4",
                "denominacion" => "EQUIPAMIENTO PARA LA NAVEGACIÓN Y SERVICIOS AUXILIARES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "HIDR05",
                "codigo" => "6 4 5",
                "denominacion" => "MEJORAMIENTO DE INFRAESTRUCTURA FLUVIAL Y LACUSTRE",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "HIDR06",
                "codigo" => "6 4 6",
                "denominacion" => "REHABILITACIÓN DE INFRAESTRUCTURA FLUVIAL Y LACUSTRE",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "HIDR07",
                "codigo" => "6 4 7",
                "denominacion" => "MANTENIMIENTO DE INFRAESTRUCTURA FLUVIAL Y LACUSTRE",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "HIDR08",
                "codigo" => "6 4 8",
                "denominacion" => "SERVICIO DE TRANSPORTE FLUVIAL Y LACUSTRE",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "HIDR09",
                "codigo" => "6 4 9",
                "denominacion" => "CONTROL Y SEGURIDAD DEL TRAFICO FLUVIAL Y LACUSTRE",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MTRNS",
                "codigo" => "6 5",
                "denominacion" => "MULTIPROGRAMA TRANSPORTES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MULT04",
                "codigo" => "6 5 1",
                "denominacion" => "MULTIPROGRAMA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTRTRS",
                "codigo" => "6 6",
                "denominacion" => "OTROS TRANSPORTES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "TRCAB",
                "codigo" => "6 6 1",
                "denominacion" => "TRANSPORTE POR CABLE",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTR05",
                "codigo" => "6 6 2",
                "denominacion" => "OTROS TRANSPORTES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INVT",
                "codigo" => "6 7",
                "denominacion" => "INVESTIGACIÓN TRANSPORTES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INVT01",
                "codigo" => "6 7 1",
                "denominacion" => "INVESTIGACIÓN TRANSPORTES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "COMUN",
                "codigo" => "7",
                "denominacion" => "COMUNICACIONES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "TEL",
                "codigo" => "7 1",
                "denominacion" => "TELECOMUNICACIONES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "TEL01",
                "codigo" => "7 1 1",
                "denominacion" => "CONSTRUCCIONES E INFRAESTRUCTURA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "TEL02",
                "codigo" => "7 1 2",
                "denominacion" => "EQUIPAMIENTO DE TELECOMUNICACIONES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "TEL03",
                "codigo" => "7 1 3",
                "denominacion" => "MEJORAMIENTO DE INFRAESTRUCTURA DE TELECOMUNICACIONES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "TEL04",
                "codigo" => "7 1 4",
                "denominacion" => "REHABILITACIÓN DE INFRAESTRUCTURA DE TELECOMUNICACIONES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "TEL05",
                "codigo" => "7 1 5",
                "denominacion" => "SERVICIO DE TELECOMUNICACIONES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "TEL06",
                "codigo" => "7 1 6",
                "denominacion" => "GESTION DEL ESPACIO ELECTROMAGNETICO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "POSTA",
                "codigo" => "7 2",
                "denominacion" => "SERVICIO POSTAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "POS01",
                "codigo" => "7 2 1",
                "denominacion" => "CONSTRUCCIONES E INFRAESTRUCTURA DE CORREOS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "POS02",
                "codigo" => "7 2 2",
                "denominacion" => "EQUIPAMIENTO DE SERVICIO POSTAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "POS03",
                "codigo" => "7 2 3",
                "denominacion" => "SERVICIO POSTAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MCOM",
                "codigo" => "7 3",
                "denominacion" => "MULTIPROGRAMA COMUNICACIONES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MULT05",
                "codigo" => "7 3 1",
                "denominacion" => "MULTIPROGRAMA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTRCOM",
                "codigo" => "7 4",
                "denominacion" => "OTROS COMUNICACIONES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTR06",
                "codigo" => "7 4 1",
                "denominacion" => "OTROS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INVC",
                "codigo" => "7 5",
                "denominacion" => "INVESTIGACIÓN COMUNICACIONES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INVC01",
                "codigo" => "7 5 1",
                "denominacion" => "INVESTIGACIÓN COMUNICACIONES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "SALUD",
                "codigo" => "8",
                "denominacion" => "SALUD",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "SAL",
                "codigo" => "8 1",
                "denominacion" => "INFRAESTRUCTURA DE SALUD",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "SAL01",
                "codigo" => "8 1 1",
                "denominacion" => "CONSTRUCCION DE INFRAESTRUCTURA Y EQUIPAMIENTO DE HOSPITALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "SAL02",
                "codigo" => "8 1 2",
                "denominacion" => "CONSTRUCCION DE INFRAESTRUCTURA Y EQUIPAMIENTO DE CENTROS DE SALUD",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "SAL03",
                "codigo" => "8 1 3",
                "denominacion" => "MEJORAMIENTO DE INFRAESTRUCTURA DE HOSPITALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "SAL04",
                "codigo" => "8 1 4",
                "denominacion" => "MEJORAMIENTO DE INFRAESTRUCTURA DE CENTROS DE SALUD",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "SAL05",
                "codigo" => "8 1 5",
                "denominacion" => "OTROS INFRAESTRUCTURA DE SALUD",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "PLA",
                "codigo" => "8 2",
                "denominacion" => "PLANIFICACIÓN Y PREVENCIÓN DE SALUD",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "PLA01",
                "codigo" => "8 2 1",
                "denominacion" => "PLANIFICACION Y EDUCACIÓN PARA LA SALUD",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "PLA02",
                "codigo" => "8 2 2",
                "denominacion" => "PROGRAMAS EN PREVENCIÓN Y EDUCACION PARA LA SALUD",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "PLA03",
                "codigo" => "8 2 3",
                "denominacion" => "REGULACIÓN Y CONTROL SANITARIO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "PLA04",
                "codigo" => "8 2 4",
                "denominacion" => "PROMOCION DE LA SALUD",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "ASAL",
                "codigo" => "8 3",
                "denominacion" => "ATENCIÓN EN SALUD",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "ASA01",
                "codigo" => "8 3 1",
                "denominacion" => "ATENCIÓN PRIMARIA EN SALUD",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "ASA02",
                "codigo" => "8 3 2",
                "denominacion" => "PROGRAMAS INTEGRALES DE SALUD",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "ASA03",
                "codigo" => "8 3 3",
                "denominacion" => "EPIDEMIOLOGIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "ASA04",
                "codigo" => "8 3 4",
                "denominacion" => "DESARROLLO MEDICINA TRADICIONAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "ASA05",
                "codigo" => "8 3 5",
                "denominacion" => "SALUD OCUPACIONAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MULSAL",
                "codigo" => "8 4",
                "denominacion" => "MULTIPROGRAMA SALUD",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MULT06",
                "codigo" => "8 4 1",
                "denominacion" => "MULTIPROGRAMA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTSLD",
                "codigo" => "8 5",
                "denominacion" => "OTROS SALUD",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTR07",
                "codigo" => "8 5 1",
                "denominacion" => "OTROS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "TELES",
                "codigo" => "8 6",
                "denominacion" => "TELESALUD",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "TELES01",
                "codigo" => "8 6 1",
                "denominacion" => "TELESALUD",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INVS",
                "codigo" => "8 7",
                "denominacion" => "INVESTIGACION SALUD",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INVS01",
                "codigo" => "8 7 1",
                "denominacion" => "INVESTIGACION SALUD",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "EDUCA",
                "codigo" => "9",
                "denominacion" => "EDUCACIÓN",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "IED",
                "codigo" => "9 1",
                "denominacion" => "INFRAESTRUCTURA DE EDUCACIÓN",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "IED01",
                "codigo" => "9 1 1",
                "denominacion" => "CONSTRUCCIÓN Y EQUIPAMIENTO DE ESCUELAS Y COLEGIOS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "IED02",
                "codigo" => "9 1 2",
                "denominacion" => "CONSTRUCCIÓN Y EQUIPAMIENTO DE CENTROS DE EDUCACION NO FORMAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "IED03",
                "codigo" => "9 1 3",
                "denominacion" => "INFRAESTRUCTURA DE EDUCACIÓN SUPERIOR",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "IED04",
                "codigo" => "9 1 4",
                "denominacion" => "OTRA INFRAESTRUCTURA EDUCATIVA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "IED05",
                "codigo" => "9 1 5",
                "denominacion" => "CONSTRUCCIÓN Y EQUIPAMIENTO EN EDUCACIÓN ALTERNATIVA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "IED06",
                "codigo" => "9 1 6",
                "denominacion" => "CONSTRUCCIÓN Y EQUIPAMIENTO EN EDUCACIÓN ESPECIAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "EDF",
                "codigo" => "9 2",
                "denominacion" => "EDUCACIÓN FORMAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "EDF01",
                "codigo" => "9 2 1",
                "denominacion" => "EDUCACIÓN BASICA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "EDF02",
                "codigo" => "9 2 2",
                "denominacion" => "EDUCACIÓN SUPERIOR",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "EDF03",
                "codigo" => "9 2 3",
                "denominacion" => "FORMACIÓN DOCENTE",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "EDF04",
                "codigo" => "9 2 4",
                "denominacion" => "FORMACIÓN OCUPACIONAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "EDF05",
                "codigo" => "9 2 5",
                "denominacion" => "ASISTENCIA EDUCATIVA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "EDF06",
                "codigo" => "9 2 6",
                "denominacion" => "DESARROLLO CURRICULAR EDUCACIÓN REGULAR",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "EDN",
                "codigo" => "9 3",
                "denominacion" => "EDUCACIÓN NO FORMAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "EDN01",
                "codigo" => "9 3 1",
                "denominacion" => "ALFABETIZACIÓN",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "EDN02",
                "codigo" => "9 3 2",
                "denominacion" => "EDUCACIÓN POPULAR",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "EDN03",
                "codigo" => "9 3 3",
                "denominacion" => "FORMACIÓN DE MANO DE OBRA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "EDN04",
                "codigo" => "9 3 4",
                "denominacion" => "DESARROLLO CURRICULAR EDUCACIÓN NO REGULAR",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "EDN05",
                "codigo" => "9 3 5",
                "denominacion" => "POST ALFABETIZACIÓN",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MEDUC",
                "codigo" => "9 4",
                "denominacion" => "MULTIPROGRAMA EDUCACION",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MULT07",
                "codigo" => "9 4 1",
                "denominacion" => "MULTIPROGRAMA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "GUA",
                "codigo" => "7 15",
                "denominacion" => "GUARAYOS",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "INVED09",
                "codigo" => "9 4 2",
                "denominacion" => "INVESTIGACIÓN EDUCACIÓN",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTREDU",
                "codigo" => "9 5",
                "denominacion" => "OTROS EDUCACION",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTR08",
                "codigo" => "9 5 1",
                "denominacion" => "OTROS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "PROMED02",
                "codigo" => "9 5 2",
                "denominacion" => "PROMOCIÓN DE LA EDUCACIÓN INTEGRAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INVEIN03",
                "codigo" => "9 5 3",
                "denominacion" => "INVESTIGACIÓN E INNOVACIÓN EDUCATIVA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "TECICE04",
                "codigo" => "9 5 4",
                "denominacion" => "TECNOLOGÍAS DE INFORMACIÓN Y COMUNICACIÓN EN EDUCACIÓN",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "SANEA",
                "codigo" => "10",
                "denominacion" => "SANEAMIENTO BÁSICO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AGU",
                "codigo" => "10 1",
                "denominacion" => "AGUA POTABLE",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AGU01",
                "codigo" => "10 1 1",
                "denominacion" => "AGUA POTABLE EN CAPITALES DE DEPARTAMENTO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AGU02",
                "codigo" => "10 1 2",
                "denominacion" => "AGUA POTABLE EN CIUDADES INTERMEDIAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AGU03",
                "codigo" => "10 1 3",
                "denominacion" => "AGUA POTABLE EN POBLADOS RURALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AGU04",
                "codigo" => "10 1 4",
                "denominacion" => "PERFORACIÓN DE POZOS PARA AGUA POTABLE",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AGU05",
                "codigo" => "10 1 5",
                "denominacion" => "REHABILITACIÓN Y AMPLIACIÓN DE SISTEMAS DE AGUA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "ALC",
                "codigo" => "10 2",
                "denominacion" => "ALCANTARILLADO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "ALC01",
                "codigo" => "10 2 1",
                "denominacion" => "ALCANTARILLADO EN CAPITALES DE DEPARTAMENTO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "ALC02",
                "codigo" => "10 2 2",
                "denominacion" => "ALCANTARILLADO EN CIUDADES INTERMEDIAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "ALC03",
                "codigo" => "10 2 3",
                "denominacion" => "ALCANTARILLADO EN POBLADOS RURALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "ALC04",
                "codigo" => "10 2 4",
                "denominacion" => "LETRINIZACIÓN",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "ALC05",
                "codigo" => "10 2 5",
                "denominacion" => "ALCANTARILLADO PLUVIAL EN CAPITALES DE DEPARTAMENTO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "ALC06",
                "codigo" => "10 2 6",
                "denominacion" => "ALCANTARILLADO PLUVIAL EN CIUDADES INTERMEDIAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "ALC07",
                "codigo" => "10 2 7",
                "denominacion" => "ALCANTARILLADO PLUVIAL EN POBLADOS RURALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "TRS",
                "codigo" => "10 3",
                "denominacion" => "TRATAMIENTO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "TRS01",
                "codigo" => "10 3 1",
                "denominacion" => "TRATAMIENTO DE AGUA POTABLE",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "TRS02",
                "codigo" => "10 3 2",
                "denominacion" => "TRATAMIENTO DE AGUAS SERVIDAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "TRS03",
                "codigo" => "10 3 3",
                "denominacion" => "TRATAMIENTO DE RESIDUOS SOLIDOS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "TRS04",
                "codigo" => "10 3 4",
                "denominacion" => "RECOLECCION Y ELIMINACION DE DESECHOS SOLIDOS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "TRS05",
                "codigo" => "10 3 5",
                "denominacion" => "REHABILITACIÓN DE PLANTAS DE TRATAMIENTO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MSANB",
                "codigo" => "10 4",
                "denominacion" => "MULTIPROGRAMA SANEAMIENTO BASICO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MULT08",
                "codigo" => "10 4 1",
                "denominacion" => "MULTIPROGRAMA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AG-01",
                "codigo" => "10 4 2",
                "denominacion" => "AGUA POTABLE Y ALCANTARILLADO EN CAPITALES DE DEPARTAMENTO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AG-02",
                "codigo" => "10 4 3",
                "denominacion" => "AGUA POTABLE Y ALCANTARILLADO EN CIUDADES INTERMEDIAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AG-03",
                "codigo" => "10 4 4",
                "denominacion" => "AGUA POTABLE Y ALCANTARILLADO EN POBLADOS RURALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AG-04",
                "codigo" => "10 4 5",
                "denominacion" => "AGUA Y LETRINIZACIÓN",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AG-05",
                "codigo" => "10 4 6",
                "denominacion" => "INVESTIGACIÓN SANEAMIENTO BÁSICO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTRSB",
                "codigo" => "10 5",
                "denominacion" => "OTROS SANEAMIENTO BASICO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTR09",
                "codigo" => "10 5 1",
                "denominacion" => "OTROS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "URBVIV",
                "codigo" => "11",
                "denominacion" => "URBANISMO Y VIVIENDA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "URB",
                "codigo" => "11 1",
                "denominacion" => "URBANISMO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "URB01",
                "codigo" => "11 1 1",
                "denominacion" => "PLANIFICACION URBANA Y URBANIZACION",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "URB02",
                "codigo" => "11 1 2",
                "denominacion" => "EQUIPAMIENTO E INFRAESTRUCTURA URBANA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "URB03",
                "codigo" => "11 1 3",
                "denominacion" => "EQUIPAMIENTO E INFRAESTRUCTURA RECREACIONAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "URB04",
                "codigo" => "11 1 4",
                "denominacion" => "MEJORAMIENTO DE INFRAESTRUCTURA URBANA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "URB05",
                "codigo" => "11 1 5",
                "denominacion" => "VIAS URBANAS Y RURALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "VIV",
                "codigo" => "11 2",
                "denominacion" => "VIVIENDA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "VIV01",
                "codigo" => "11 2 1",
                "denominacion" => "PLANIFICACION PARA LA DOTACION DE LA VIVIENDA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "VIV02",
                "codigo" => "11 2 2",
                "denominacion" => "CONSTRUCCIÓN DE VIVIENDAS EN CAPITAL DE DEPARTAMENTO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "VIV03",
                "codigo" => "11 2 3",
                "denominacion" => "CONSTRUCCIÓN DE VIVIENDAS EN CIUDADES INTERMEDIAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "VIV04",
                "codigo" => "11 2 4",
                "denominacion" => "CONSTRUCCIÓN DE VIVIENDAS EN POBLADOS RURALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MURVI",
                "codigo" => "11 3",
                "denominacion" => "MULTIPROGRAMA URBANISMO Y VIVIENDA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MULT09",
                "codigo" => "11 3 1",
                "denominacion" => "MULTIPROGRAMA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INVURBV",
                "codigo" => "11 3 2",
                "denominacion" => "INVESTIGACIÓN URBANISMO Y VIVIENDA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTURV",
                "codigo" => "11 4",
                "denominacion" => "OTROS URBANISMO Y VIVIENDA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTR10",
                "codigo" => "11 4 1",
                "denominacion" => "OTROS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "RECH",
                "codigo" => "12",
                "denominacion" => "RECURSOS HÍDRICOS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "APR",
                "codigo" => "12 1",
                "denominacion" => "APROVECHAMIENTO DE RECURSOS HIDRICOS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "APR01",
                "codigo" => "12 1 1",
                "denominacion" => "CONSTRUCCION DE ATAJADOS Y RESERVORIOS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "APR02",
                "codigo" => "12 1 2",
                "denominacion" => "PERFORACION DE POZOS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "APR03",
                "codigo" => "12 1 3",
                "denominacion" => "EXPLORACION DE RECURSOS HÍDRICOS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MIC",
                "codigo" => "12 2",
                "denominacion" => "MANEJO INTEGRAL DE CUENCAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MIC01",
                "codigo" => "12 2 1",
                "denominacion" => "DEFENSIVOS Y DEFLECTORES FLUVIALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MIC02",
                "codigo" => "12 2 2",
                "denominacion" => "CONTROL DE AGUA Y EROSION",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MIC03",
                "codigo" => "12 2 3",
                "denominacion" => "CONTROL DE CARCAVAS Y AVENIDAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MIC04",
                "codigo" => "12 2 4",
                "denominacion" => "CANALIZACION DE RIOS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MIC05",
                "codigo" => "12 2 5",
                "denominacion" => "GESTIÓN Y MANEJO DE CUENCAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MIC06",
                "codigo" => "12 2 6",
                "denominacion" => "REMEDIACIÓN DE PASIVOS AMBIENTALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MHIDR",
                "codigo" => "12 3",
                "denominacion" => "MULTIPROGRAMA RECURSOS HIDRICOS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MULT10",
                "codigo" => "12 3 1",
                "denominacion" => "MULTIPROGRAMA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INVRH",
                "codigo" => "12 3 2",
                "denominacion" => "INVESTIGACIÓN RECURSOS HÍDRICOS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTRHID",
                "codigo" => "12 4",
                "denominacion" => "OTROS RECURSOS HIDRICOS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTR11",
                "codigo" => "12 4 1",
                "denominacion" => "OTROS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "COMER",
                "codigo" => "13",
                "denominacion" => "COMERCIO Y FINANZAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "COM",
                "codigo" => "13 1",
                "denominacion" => "COMERCIO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "COM01",
                "codigo" => "13 1 1",
                "denominacion" => "ASUNTOS COMERCIALES Y LABORALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "COM02",
                "codigo" => "13 1 2",
                "denominacion" => "DESARROLLO Y PROMOCION DEL COMERCIO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "FIN",
                "codigo" => "13 2",
                "denominacion" => "FINANZAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "FIN01",
                "codigo" => "13 2 1",
                "denominacion" => "SUPERVISIÓN DE LA BANCA Y SEGUROS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MCOFI",
                "codigo" => "13 3",
                "denominacion" => "MULTIPROGRAMA COMERCIO Y FINANZAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MULT11",
                "codigo" => "13 3 1",
                "denominacion" => "MULTIPROGRAMA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INVCF",
                "codigo" => "13 3 2",
                "denominacion" => "INVESTIGACIÓN COMERCIO Y FINANZAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTRCF",
                "codigo" => "13 4",
                "denominacion" => "OTROS COMERCIO Y FINANZAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTR12",
                "codigo" => "13 4 1",
                "denominacion" => "OTROS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "AGUB",
                "codigo" => "14",
                "denominacion" => "ADMINISTRACION GENERAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "JUD",
                "codigo" => "14 1",
                "denominacion" => "ÓRGANO JUDICIAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "JUD01",
                "codigo" => "14 1 1",
                "denominacion" => "INFRAESTRUCTURA Y EQUIPAMIENTO DE APOYO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "LEG",
                "codigo" => "14 2",
                "denominacion" => "ÓRGANO LEGISLATIVO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "LEG01",
                "codigo" => "14 2 1",
                "denominacion" => "INFRAESTRUCTURA Y EQUIPAMIENTO DE APOYO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OEL",
                "codigo" => "14 3",
                "denominacion" => "ÓRGANO ELECTORAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OEL01",
                "codigo" => "14 3 1",
                "denominacion" => "INFRAESTRUCTURA Y EQUIPAMIENTO DE APOYO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "EJE",
                "codigo" => "14 4",
                "denominacion" => "ADMINISTRACION SUPERIOR EJECUTIVA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "ADF",
                "codigo" => "14 5",
                "denominacion" => "ADMINISTRACION FINANCIERA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "REXT",
                "codigo" => "14 6",
                "denominacion" => "RELACIONES EXTERIORES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "EST",
                "codigo" => "14 7",
                "denominacion" => "INFORMACION ESTADÍSTICA Y PLANIFICACIÓN",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "SPER",
                "codigo" => "14 8",
                "denominacion" => "SERVICIOS DE PERSONAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTR13",
                "codigo" => "14 9",
                "denominacion" => "OTROS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "POLIC",
                "codigo" => "15",
                "denominacion" => "ORDEN PUBLICO Y SEGURIDAD CIUDADANA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "POL",
                "codigo" => "15 1",
                "denominacion" => "POLICIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "POL01",
                "codigo" => "15 1 1",
                "denominacion" => "SERVICIOS POLICIALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "POL02",
                "codigo" => "15 1 2",
                "denominacion" => "ORDEN INTERNO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "POL03",
                "codigo" => "15 1 3",
                "denominacion" => "CONTROL DROGAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "POL04",
                "codigo" => "15 1 4",
                "denominacion" => "SISTEMA PENITENCIARIO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "POLI",
                "codigo" => "15 2",
                "denominacion" => "INFRAESTRUCTURA Y EQUIPAMIENTO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "POLI01",
                "codigo" => "15 2 1",
                "denominacion" => "INFRAESTRUCTURA DE APOYO Y EQUIPAMIENTO AL SISTEMA POLICIAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "POLI02",
                "codigo" => "15 2 2",
                "denominacion" => "EQUIPAMIENTO DE SEGURIDAD CIUDADANA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTRPOL",
                "codigo" => "15 3",
                "denominacion" => "OTROS ORDEN PUBLICO Y SEGURIDAD CIUDADANA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTR14",
                "codigo" => "15 3 1",
                "denominacion" => "OTROS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INVOPSC",
                "codigo" => "15 3 2",
                "denominacion" => "INVESTIGACION EN ORDEN PÚBLICO Y SEGURIDAD CIUDADANA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "DEF",
                "codigo" => "16",
                "denominacion" => "DEFENSA NACIONAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "DEFM",
                "codigo" => "16 1",
                "denominacion" => "DEFENSA MILITAR",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "DEFN01",
                "codigo" => "16 1 1",
                "denominacion" => "DEFENSA NACIONAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "DEFN02",
                "codigo" => "16 1 2",
                "denominacion" => "INFRAESTRUCTURA MILITAR",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "DEFN03",
                "codigo" => "16 1 3",
                "denominacion" => "EQUIPAMIENTO MILITAR",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "DEFC",
                "codigo" => "16 2",
                "denominacion" => "DEFENSA CIVIL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "DEFC01",
                "codigo" => "16 2 1",
                "denominacion" => "PREVENCIÓN DE DESASTRES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "DEFC02",
                "codigo" => "16 2 2",
                "denominacion" => "ATENCIÓN DE DESASTRES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTRDN",
                "codigo" => "16 3",
                "denominacion" => "OTROS DEFENSA NACIONAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTR15",
                "codigo" => "16 3 1",
                "denominacion" => "OTROS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "DEUDA",
                "codigo" => "17",
                "denominacion" => "DEUDA PÚBLICA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "DEU",
                "codigo" => "17 1",
                "denominacion" => "INTERESES DE LA DEUDA PUBLICA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTR16",
                "codigo" => "17 2",
                "denominacion" => "OTROS GASTOS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MULTI",
                "codigo" => "18",
                "denominacion" => "MULTISECTORIAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "DESRUR",
                "codigo" => "18 1",
                "denominacion" => "ESTUDIOS PARA EL DESARROLLO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "DES01",
                "codigo" => "18 1 1",
                "denominacion" => "ESTUDIOS BASICOS PARA EL DESARROLLO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "DES02",
                "codigo" => "18 1 2",
                "denominacion" => "PROGRAMAS DE DESARROLLO RURAL SOSTENIBLE",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "DES03",
                "codigo" => "18 1 3",
                "denominacion" => "ORDENAMIENTO TERRITORIAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "DES04",
                "codigo" => "18 1 4",
                "denominacion" => "INVESTIGACIÓN PARA EL DESARROLLO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MPRG",
                "codigo" => "18 2",
                "denominacion" => "MULTIPROGRAMA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MULTSEC",
                "codigo" => "18 2 1",
                "denominacion" => "PROGRAMAS MULTISECTORIALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INVTM",
                "codigo" => "18 2 2",
                "denominacion" => "INVESTIGACIÓN TEMÁTICAS MULTISECORIALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "FORINST",
                "codigo" => "18 3",
                "denominacion" => "FORTALECIMIENTO INSTITUCIONAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "FORINST01",
                "codigo" => "18 3 1",
                "denominacion" => "PROGRAMAS DE FORTALECIMIENTO INSTITUCIONAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INVFI",
                "codigo" => "18 3 2",
                "denominacion" => "INVESTIGACIÓN EN FORTALECIMIENTO INSTITUCIONAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MEDAM",
                "codigo" => "19",
                "denominacion" => "MEDIO AMBIENTE",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CPM",
                "codigo" => "19 1",
                "denominacion" => "CONSERVACIÓN Y PROTECCIÓN DEL MEDIO AMBIENTE",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CPMA01",
                "codigo" => "19 1 1",
                "denominacion" => "ESTUDIOS DE RECURSOS NATURALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CPMA02",
                "codigo" => "19 1 2",
                "denominacion" => "MANEJO DE PARQUES Y ÁREAS PROTEGIDAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CPMA03",
                "codigo" => "19 1 3",
                "denominacion" => "BIODIVERSIDAD",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CPMA04",
                "codigo" => "19 1 4",
                "denominacion" => "FORESTACIÓN",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CPMA05",
                "codigo" => "19 1 5",
                "denominacion" => "REFORESTACIÓN",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CPMA06",
                "codigo" => "19 1 6",
                "denominacion" => "CONSERVACIÓN Y CONTROL EROSIÓN DE SUELOS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CPMA07",
                "codigo" => "19 1 7",
                "denominacion" => "REMEDIACIÓN DE PASIVOS AMBIENTALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTR17",
                "codigo" => "19 1 8",
                "denominacion" => "OTROS MEDIO AMBIENTE",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INVMA",
                "codigo" => "19 1 9",
                "denominacion" => "INVESTIGACIÓN MEDIO AMBIENTE",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "TURIS",
                "codigo" => "20",
                "denominacion" => "TURISMO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "TUR",
                "codigo" => "20 1",
                "denominacion" => "DESARROLLO TURISTICO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "TUR01",
                "codigo" => "20 1 1",
                "denominacion" => "PROMOCION TURISTICA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "TUR02",
                "codigo" => "20 1 2",
                "denominacion" => "ACTIVIDADES TURISTICAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "TUR03",
                "codigo" => "20 1 3",
                "denominacion" => "INFRAESTRUCTURA TURISTICA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTR18",
                "codigo" => "20 1 4",
                "denominacion" => "OTROS TURISMO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "TUR05",
                "codigo" => "20 1 5",
                "denominacion" => "DESARROLLO TURISMO COMUNITARIO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "TUR06",
                "codigo" => "20 1 6",
                "denominacion" => "INVESTIGACIÓN TURISMO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "SEGSOC",
                "codigo" => "21",
                "denominacion" => "SEGURIDAD SOCIAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "SEGC",
                "codigo" => "21 1",
                "denominacion" => "SEGURIDAD SOCIAL CORTO PLAZO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "SEGC01",
                "codigo" => "21 1 1",
                "denominacion" => "INFRAESTRUCTURA Y EQUIPAMIENTO CAJAS DE SALUD",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "SEGC02",
                "codigo" => "21 1 2",
                "denominacion" => "MEJORAMIENTO Y AMPLIACIÓN DE INFRAESTRUCTURA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "SEGC03",
                "codigo" => "21 1 3",
                "denominacion" => "SEGURIDAD SOCIAL EN SALUD",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "SEGL",
                "codigo" => "21 2",
                "denominacion" => "SEGURIDAD SOCIAL LARGO PLAZO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "SEGL01",
                "codigo" => "21 2 1",
                "denominacion" => "SISTEMA DE PENSIONES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTSEG",
                "codigo" => "21 3",
                "denominacion" => "OTROS SEGURIDAD SOCIAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTSEG",
                "codigo" => "21 3 1",
                "denominacion" => "CONSTRUCCIÓN Y EQUIPAMIENTO DE ORFANATOS, HOGARES, ALBERGUES, GUARDERIAS Y SIMILARES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTR19",
                "codigo" => "21 3 2",
                "denominacion" => "OTROS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INVSS",
                "codigo" => "21 4",
                "denominacion" => "INVESTIGACIÓN SEGURIDAD SOCIAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INVSS01",
                "codigo" => "21 4 1",
                "denominacion" => "INVESTIGACIÓN SEGURIDAD SOCIAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CULTU",
                "codigo" => "22",
                "denominacion" => "CULTURA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CUL",
                "codigo" => "22 1",
                "denominacion" => "DESARROLLO DE LA CULTURA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CUL01",
                "codigo" => "22 1 1",
                "denominacion" => "CONSTRUCCIÓN Y EQUIPAMIENTO DE INFRAESTRUCTURA CULTURAL Y PATRIMONIAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CUL02",
                "codigo" => "22 1 2",
                "denominacion" => "MEJORAMIENTO Y RECUPERACIÓN DE INFRAESTRUCTURA CULTURAL Y PATRIMONIAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CUL03",
                "codigo" => "22 1 3",
                "denominacion" => "RECUPERACIÓN DE ACTIVOS CULTURALES Y PATRIMONIALES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CUL04",
                "codigo" => "22 1 4",
                "denominacion" => "PROMOCIÓN CULTURAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "MULT12",
                "codigo" => "22 1 5",
                "denominacion" => "OTROS CULTURA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INVCUL",
                "codigo" => "22 1 6",
                "denominacion" => "INVESTIGACIÓN CULTURA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "JUSTC",
                "codigo" => "23",
                "denominacion" => "JUSTICIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "JUS01",
                "codigo" => "23 1 1",
                "denominacion" => "INFRAESTRUCTURA Y EQUIPAMIENTO DEL SISTEMA DE JUSTICIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "JUS02",
                "codigo" => "23 1 2",
                "denominacion" => "MEJORAMIENTO DE INFRAESTRUCTURA DEL SISTEMA DE JUSTICIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "JUS03",
                "codigo" => "23 1 3",
                "denominacion" => "ADMINISTRACIÓN DE JUSTICIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "JUS04",
                "codigo" => "23 1 4",
                "denominacion" => "SEGURIDAD JURÍDICA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTR20",
                "codigo" => "23 1 5",
                "denominacion" => "OTROS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INVJUS",
                "codigo" => "23 1 6",
                "denominacion" => "INVESTIGACIÓN JUSTICIA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "DEPOR",
                "codigo" => "24",
                "denominacion" => "DEPORTES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "DEP",
                "codigo" => "24 1",
                "denominacion" => "DESARROLLO DEL DEPORTE",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "DEP01",
                "codigo" => "24 1 1",
                "denominacion" => "PROMOCIÓN Y FORTALECIMIENTO DEPORTIVO",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "DEP02",
                "codigo" => "24 1 2",
                "denominacion" => "CONSTRUCCIÓN Y EQUIPAMIENTO DE INFRAESTRUCTURA DEPORTIVA URBANA",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "DEP03",
                "codigo" => "24 1 3",
                "denominacion" => "CONSTRUCCIÓN Y EQUIPAMIENTO DE INFRAESTRUCTURA DEPORTIVA RURAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "DEP04",
                "codigo" => "24 1 4",
                "denominacion" => "ASISTENCIA TÉCNICA Y CAPACITACIÓN PARA EVENTOS DEPORTIVOS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "DEP05",
                "codigo" => "24 1 5",
                "denominacion" => "REALIZACIÓN DE EVENTOS Y COMPETENCIAS DEPORTIVAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "OTRSD",
                "codigo" => "24 1 6",
                "denominacion" => "OTROS",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "INVDEP",
                "codigo" => "24 1 7",
                "denominacion" => "INVESTIGACIÓN DEPORTES",
                "descripcion" => "-",
                "fk_id_clasificador" => 7
            ],
            [
                "sigla" => "CHUQ",
                "codigo" => "1",
                "denominacion" => "CHUQUISACA",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ORO",
                "codigo" => "1 1",
                "denominacion" => "OROPEZA",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SUC",
                "codigo" => "1 1 1",
                "denominacion" => "Sucre",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "YOT",
                "codigo" => "1 1 2",
                "denominacion" => "Yotala",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "POR",
                "codigo" => "1 1 3",
                "denominacion" => "Poroma",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "A01",
                "codigo" => "1 1 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "AZUR",
                "codigo" => "1 2",
                "denominacion" => "JUANA AZURDUY DE PADILLA",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "AZU",
                "codigo" => "1 2 1",
                "denominacion" => "Villa Azurduy",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TAR",
                "codigo" => "1 2 2",
                "denominacion" => "Tarvita (Villa Orías)",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "A02",
                "codigo" => "1 2 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ZUD",
                "codigo" => "1 3",
                "denominacion" => "JAIME ZUDAÑEZ",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "VZU",
                "codigo" => "1 3 1",
                "denominacion" => "Villa Zudañez (Tacopaya)",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PRE",
                "codigo" => "1 3 2",
                "denominacion" => "Presto",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "VMO",
                "codigo" => "1 3 3",
                "denominacion" => "Villa Mojocoya",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MUJ",
                "codigo" => "1 3 4",
                "denominacion" => "Icla",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "A03",
                "codigo" => "1 3 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "JME",
                "codigo" => "1 4",
                "denominacion" => "TOMINA",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PAD",
                "codigo" => "1 4 1",
                "denominacion" => "Padilla",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "VTM",
                "codigo" => "1 4 2",
                "denominacion" => "Tomina",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SOP",
                "codigo" => "1 4 3",
                "denominacion" => "Sopachuy",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ALC",
                "codigo" => "1 4 4",
                "denominacion" => "Villa Alcalá",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "VIL",
                "codigo" => "1 4 5",
                "denominacion" => "El Villar",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "A04",
                "codigo" => "1 4 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SIL",
                "codigo" => "1 5",
                "denominacion" => "HERNANDO SILES",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "VMT",
                "codigo" => "1 5 1",
                "denominacion" => "Monteagudo",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PDM",
                "codigo" => "1 5 2",
                "denominacion" => "San Pablo de Huacareta",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "A05",
                "codigo" => "1 5 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "YAM",
                "codigo" => "1 6",
                "denominacion" => "YAMPARAEZ",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TAB",
                "codigo" => "1 6 1",
                "denominacion" => "Tarabuco",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "YAM",
                "codigo" => "1 6 2",
                "denominacion" => "Yamparáez",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "A06",
                "codigo" => "1 6 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "NCI",
                "codigo" => "1 7",
                "denominacion" => "NOR CINTI",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CAM",
                "codigo" => "1 7 1",
                "denominacion" => "Camargo",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "LUC",
                "codigo" => "1 7 2",
                "denominacion" => "San Lucas",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "INC",
                "codigo" => "1 7 3",
                "denominacion" => "Incahuasi",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "VCH",
                "codigo" => "1 7 4",
                "denominacion" => "Villa Charcas",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "A07",
                "codigo" => "1 7 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "BOE",
                "codigo" => "1 8",
                "denominacion" => "BELISARIO BOETO",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SER",
                "codigo" => "1 8 1",
                "denominacion" => "Villa Serrano",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "A08",
                "codigo" => "1 8 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SCI",
                "codigo" => "1 9",
                "denominacion" => "SUD CINTI",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ABE",
                "codigo" => "1 9 1",
                "denominacion" => "Camataqui (Villa Abecia)",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CUL",
                "codigo" => "1 9 2",
                "denominacion" => "Culpina",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CRR",
                "codigo" => "1 9 3",
                "denominacion" => "Las Carreras",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "A09",
                "codigo" => "1 9 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CLV",
                "codigo" => "1 10",
                "denominacion" => "LUIS CALVO",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MUY",
                "codigo" => "1 10 1",
                "denominacion" => "Villa Vaca Guzmán",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "VHY",
                "codigo" => "1 10 2",
                "denominacion" => "Villa de Huacaya",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MAC",
                "codigo" => "1 10 3",
                "denominacion" => "Machareti",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "A10",
                "codigo" => "1 10 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MP1",
                "codigo" => "1 31",
                "denominacion" => "MULTIPROVINCIAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "AM1",
                "codigo" => "1 31 31",
                "denominacion" => "MULTIMUNICIPAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "LAP",
                "codigo" => "2",
                "denominacion" => "LA PAZ",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MUR",
                "codigo" => "2 1",
                "denominacion" => "MURILLO",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "LPZ",
                "codigo" => "2 1 1",
                "denominacion" => "La Paz",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PLC",
                "codigo" => "2 1 2",
                "denominacion" => "Palca",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MEC",
                "codigo" => "2 1 3",
                "denominacion" => "Mecapaca",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ACH",
                "codigo" => "2 1 4",
                "denominacion" => "Achocalla",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ELLA",
                "codigo" => "2 1 5",
                "denominacion" => "El Alto de La Paz",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "B01",
                "codigo" => "2 1 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ING",
                "codigo" => "2 2",
                "denominacion" => "INGAVI",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "VIA",
                "codigo" => "2 2 1",
                "denominacion" => "Viacha",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "GUA",
                "codigo" => "2 2 2",
                "denominacion" => "Guaqui",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TIA",
                "codigo" => "2 2 3",
                "denominacion" => "Tiahuanacu",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "DES",
                "codigo" => "2 2 4",
                "denominacion" => "Desaguadero",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "AMA",
                "codigo" => "2 2 5",
                "denominacion" => "San Andrés de Machaca",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "JMK",
                "codigo" => "2 2 6",
                "denominacion" => "Jesús de Machaca",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TCO",
                "codigo" => "2 2 7",
                "denominacion" => "Taraco",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "B02",
                "codigo" => "2 2 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CRN",
                "codigo" => "2 3",
                "denominacion" => "CARANAVI",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CRV",
                "codigo" => "2 3 1",
                "denominacion" => "Caranavi",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ABN",
                "codigo" => "2 3 2",
                "denominacion" => "Alto Beni",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "B03",
                "codigo" => "2 3 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ARO",
                "codigo" => "2 4",
                "denominacion" => "AROMA",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SIC",
                "codigo" => "2 4 1",
                "denominacion" => "SicaSica (Villa Aroma)",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "UMA",
                "codigo" => "2 4 2",
                "denominacion" => "Umala",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "AYO",
                "codigo" => "2 4 3",
                "denominacion" => "AyoAyo",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CAL",
                "codigo" => "2 4 4",
                "denominacion" => "Calamarca",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PAT",
                "codigo" => "2 4 5",
                "denominacion" => "Patacamaya",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "COL",
                "codigo" => "2 4 6",
                "denominacion" => "Colquencha",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "COA",
                "codigo" => "2 4 7",
                "denominacion" => "Collana",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "B04",
                "codigo" => "2 4 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "INQ",
                "codigo" => "2 5",
                "denominacion" => "INQUISIVI",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "INQ",
                "codigo" => "2 5 1",
                "denominacion" => "Inquisivi",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "QUI",
                "codigo" => "2 5 2",
                "denominacion" => "Quime",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CAJ",
                "codigo" => "2 5 3",
                "denominacion" => "Cajuata",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "COQ",
                "codigo" => "2 5 4",
                "denominacion" => "Colquiri",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ICH",
                "codigo" => "2 5 5",
                "denominacion" => "Ichoca",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "LIC",
                "codigo" => "2 5 6",
                "denominacion" => "Licoma Pampa",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "B05",
                "codigo" => "2 5 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "OMA",
                "codigo" => "2 6",
                "denominacion" => "OMASUYOS",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "AHÍ",
                "codigo" => "2 6 1",
                "denominacion" => "Achacachi",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ANC",
                "codigo" => "2 6 2",
                "denominacion" => "Ancoraimes",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "HUR",
                "codigo" => "2 6 4",
                "denominacion" => "Huarina",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SAH",
                "codigo" => "2 6 5",
                "denominacion" => "Santiago de Huata",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "HUT",
                "codigo" => "2 6 6",
                "denominacion" => "Huatajata",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CHC",
                "codigo" => "2 6 7",
                "denominacion" => "ChuaCocani",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "B06",
                "codigo" => "2 6 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "LAR",
                "codigo" => "2 7",
                "denominacion" => "LARECAJA",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SOR",
                "codigo" => "2 7 1",
                "denominacion" => "Sorata",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "GNY",
                "codigo" => "2 7 2",
                "denominacion" => "Guanay",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TAT",
                "codigo" => "2 7 3",
                "denominacion" => "Tacacoma",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TIP",
                "codigo" => "2 7 4",
                "denominacion" => "Tipuani",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "QBY",
                "codigo" => "2 7 5",
                "denominacion" => "Quiabaya",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "COM",
                "codigo" => "2 7 6",
                "denominacion" => "Combaya",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MAP",
                "codigo" => "2 7 7",
                "denominacion" => "Mapiri",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TEO",
                "codigo" => "2 7 8",
                "denominacion" => "Teoponte",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "B07",
                "codigo" => "2 7 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MKA",
                "codigo" => "2 8",
                "denominacion" => "MANCO KAPAC",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "COP",
                "codigo" => "2 8 1",
                "denominacion" => "Copacabana",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SPT",
                "codigo" => "2 8 2",
                "denominacion" => "San Pedro de Tiquina",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "YUP",
                "codigo" => "2 8 3",
                "denominacion" => "Tito Yupanqui",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "B08",
                "codigo" => "2 8 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MUN",
                "codigo" => "2 9",
                "denominacion" => "MUÑECAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CHU",
                "codigo" => "2 9 1",
                "denominacion" => "Chuma",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "AYA",
                "codigo" => "2 9 2",
                "denominacion" => "Ayata",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "AUC",
                "codigo" => "2 9 3",
                "denominacion" => "Aucapata",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "B09",
                "codigo" => "2 9 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PAC",
                "codigo" => "2 10",
                "denominacion" => "PACAJES",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "COR",
                "codigo" => "2 10 1",
                "denominacion" => "Corocoro",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CAQ",
                "codigo" => "2 10 2",
                "denominacion" => "Caquiaviri",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CAC",
                "codigo" => "2 10 3",
                "denominacion" => "Calacoto",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CMC",
                "codigo" => "2 10 4",
                "denominacion" => "Comanche",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CHA",
                "codigo" => "2 10 5",
                "denominacion" => "Charaña",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "BAL",
                "codigo" => "2 10 6",
                "denominacion" => "Waldo Ballivián",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "NAZ",
                "codigo" => "2 10 7",
                "denominacion" => "Nazacara de Pacajes",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SCA",
                "codigo" => "2 10 8",
                "denominacion" => "Santiago de Callapa",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "B10",
                "codigo" => "2 10 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "GEC",
                "codigo" => "2 11",
                "denominacion" => "GENERAL ELIODORO CAMACHO",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ACO",
                "codigo" => "2 11 1",
                "denominacion" => "Puerto Acosta",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MOC",
                "codigo" => "2 11 2",
                "denominacion" => "Mocomoco",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CCH",
                "codigo" => "2 11 3",
                "denominacion" => "Carabuco",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "HUN",
                "codigo" => "2 11 4",
                "denominacion" => "Humanata",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ESC",
                "codigo" => "2 11 5",
                "denominacion" => "Escoma",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "B11",
                "codigo" => "2 11 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TAM",
                "codigo" => "2 12",
                "denominacion" => "FRANZ TAMAYO",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "APO",
                "codigo" => "2 12 1",
                "denominacion" => "Apolo",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PEL",
                "codigo" => "2 12 2",
                "denominacion" => "Pelechuco",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "B12",
                "codigo" => "2 12 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "LOA",
                "codigo" => "2 13",
                "denominacion" => "LOAYZA",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "LUR",
                "codigo" => "2 13 1",
                "denominacion" => "Luribay",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SAP",
                "codigo" => "2 13 2",
                "denominacion" => "Sapahaqui",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "YAC",
                "codigo" => "2 13 3",
                "denominacion" => "Yaco",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MAL",
                "codigo" => "2 13 4",
                "denominacion" => "Malla",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CAI",
                "codigo" => "2 13 5",
                "denominacion" => "Cairoma",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "B13",
                "codigo" => "2 13 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SYU",
                "codigo" => "2 14",
                "denominacion" => "SUDYUNGAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CHL",
                "codigo" => "2 14 1",
                "denominacion" => "Chulumani (Villa de la Libertad)",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "IRU",
                "codigo" => "2 14 2",
                "denominacion" => "Irupana (Villa de Lanza)",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "YAN",
                "codigo" => "2 14 3",
                "denominacion" => "Yanacachi",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "BLA",
                "codigo" => "2 14 4",
                "denominacion" => "Palos Blancos",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ASU",
                "codigo" => "2 14 5",
                "denominacion" => "La Asunta",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "B14",
                "codigo" => "2 14 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ADN",
                "codigo" => "2 15",
                "denominacion" => "LOS ANDES",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PUC",
                "codigo" => "2 15 1",
                "denominacion" => "Pucarani",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "LAJ",
                "codigo" => "2 15 2",
                "denominacion" => "Laja",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "BAT",
                "codigo" => "2 15 3",
                "denominacion" => "Batallas",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PER",
                "codigo" => "2 15 4",
                "denominacion" => "Puerto Pérez",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "B15",
                "codigo" => "2 15 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "NYU",
                "codigo" => "2 16",
                "denominacion" => "NORYUNGAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "COC",
                "codigo" => "2 16 1",
                "denominacion" => "Coroico",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CRI",
                "codigo" => "2 16 2",
                "denominacion" => "Coripata",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "B16",
                "codigo" => "2 16 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ITU",
                "codigo" => "2 17",
                "denominacion" => "ABEL ITURRALDE",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "IXI",
                "codigo" => "2 17 1",
                "denominacion" => "Ixiamas",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SBV",
                "codigo" => "2 17 2",
                "denominacion" => "San Buenaventura",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "B17",
                "codigo" => "2 17 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SAA",
                "codigo" => "2 18",
                "denominacion" => "BAUTISTA SAAVEDRA",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CPE",
                "codigo" => "2 18 1",
                "denominacion" => "General Juan José Pérez (Charazani)",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CUR",
                "codigo" => "2 18 2",
                "denominacion" => "Curva",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "B18",
                "codigo" => "2 18 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "GVIL",
                "codigo" => "2 19",
                "denominacion" => "GUALBERTO VILLARROEL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PEC",
                "codigo" => "2 19 1",
                "denominacion" => "San Pedro de Curahuara",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PAP",
                "codigo" => "2 19 2",
                "denominacion" => "Papel Pampa",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CLL",
                "codigo" => "2 19 3",
                "denominacion" => "Chacarilla",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "B19",
                "codigo" => "2 19 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PND",
                "codigo" => "2 20",
                "denominacion" => "GENERAL JOSE MANUEL PANDO",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SMA",
                "codigo" => "2 20 1",
                "denominacion" => "Santiago de Machaca",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CAT",
                "codigo" => "2 20 2",
                "denominacion" => "Catacora",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "B20",
                "codigo" => "2 20 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MP2",
                "codigo" => "2 31",
                "denominacion" => "MULTIPROVINCIAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "BM1",
                "codigo" => "2 31 31",
                "denominacion" => "MULTIMUNICIPAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CBB",
                "codigo" => "3",
                "denominacion" => "COCHABAMBA",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CEC",
                "codigo" => "3 1",
                "denominacion" => "CERCADO",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CBB",
                "codigo" => "3 1 1",
                "denominacion" => "Cochabamba",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "C01",
                "codigo" => "3 1 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "QUI",
                "codigo" => "3 2",
                "denominacion" => "QUILLACOLLO",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "QLL",
                "codigo" => "3 2 1",
                "denominacion" => "Quillacollo",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SIP",
                "codigo" => "3 2 2",
                "denominacion" => "SipeSipe",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TIQ",
                "codigo" => "3 2 3",
                "denominacion" => "Tiquipaya",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "VIN",
                "codigo" => "3 2 4",
                "denominacion" => "Vinto",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CCP",
                "codigo" => "3 2 5",
                "denominacion" => "Colcapirhua",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "C02",
                "codigo" => "3 2 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "GNC",
                "codigo" => "3 3",
                "denominacion" => "GENERAL NARCISO CAMPERO",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "AIQ",
                "codigo" => "3 3 1",
                "denominacion" => "Aiquile",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PAS",
                "codigo" => "3 3 2",
                "denominacion" => "Pasorapa",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "OME",
                "codigo" => "3 3 3",
                "denominacion" => "Omereque",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "C03",
                "codigo" => "3 3 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "AYP",
                "codigo" => "3 4",
                "denominacion" => "AYOPAYA",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "IND",
                "codigo" => "3 4 1",
                "denominacion" => "Ayopaya (Villa de Independencia)",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MOH",
                "codigo" => "3 4 2",
                "denominacion" => "Morochata",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CCT",
                "codigo" => "3 4 3",
                "denominacion" => "Cocapata",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "C04",
                "codigo" => "3 4 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CPR",
                "codigo" => "3 5",
                "denominacion" => "CHAPARE",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SCB",
                "codigo" => "3 5 1",
                "denominacion" => "Sacaba",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CLM",
                "codigo" => "3 5 2",
                "denominacion" => "Colomi",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TUN",
                "codigo" => "3 5 3",
                "denominacion" => "Villa Tunari",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "C05",
                "codigo" => "3 5 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PUN",
                "codigo" => "3 6",
                "denominacion" => "PUNATA",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PNT",
                "codigo" => "3 6 1",
                "denominacion" => "Punata",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "VRV",
                "codigo" => "3 6 2",
                "denominacion" => "Villa Rivero",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MEN",
                "codigo" => "3 6 3",
                "denominacion" => "San Benito (Villa José Quintín Mendoza)",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TAC",
                "codigo" => "3 6 4",
                "denominacion" => "Tacachi",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "VGV",
                "codigo" => "3 6 5",
                "denominacion" => "Cuchumuela (Villa Gualberto Villarroel)",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "C06",
                "codigo" => "3 6 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ARZ",
                "codigo" => "3 7",
                "denominacion" => "ESTEBAN ARCE",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TRT",
                "codigo" => "3 7 1",
                "denominacion" => "Tarata",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ANZ",
                "codigo" => "3 7 2",
                "denominacion" => "Anzaldo",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ARB",
                "codigo" => "3 7 3",
                "denominacion" => "Arbieto",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SBB",
                "codigo" => "3 7 4",
                "denominacion" => "Sacabamba",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "C07",
                "codigo" => "3 7 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "JOR",
                "codigo" => "3 8",
                "denominacion" => "GERMAN JORDAN",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CLI",
                "codigo" => "3 8 1",
                "denominacion" => "Cliza",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TOC",
                "codigo" => "3 8 2",
                "denominacion" => "Toco",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TLA",
                "codigo" => "3 8 3",
                "denominacion" => "Tolata",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "C08",
                "codigo" => "3 8 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CPN",
                "codigo" => "3 9",
                "denominacion" => "CAPINOTA",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CAP",
                "codigo" => "3 9 1",
                "denominacion" => "Capinota",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SAN",
                "codigo" => "3 9 2",
                "denominacion" => "Santivañez",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SCY",
                "codigo" => "3 9 3",
                "denominacion" => "Sicaya",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "C09",
                "codigo" => "3 9 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TPA",
                "codigo" => "3 10",
                "denominacion" => "TAPACARI",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TAP",
                "codigo" => "3 10 1",
                "denominacion" => "Tapacarí",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "C10",
                "codigo" => "3 10 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CRS",
                "codigo" => "3 11",
                "denominacion" => "CARRASCO",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TOT",
                "codigo" => "3 11 1",
                "denominacion" => "Totora",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "POJ",
                "codigo" => "3 11 2",
                "denominacion" => "Pojo",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "POC",
                "codigo" => "3 11 3",
                "denominacion" => "Pocona",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CHI",
                "codigo" => "3 11 4",
                "denominacion" => "Chimoré",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PVI",
                "codigo" => "3 11 5",
                "denominacion" => "Puerto Villarroel",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ERI",
                "codigo" => "3 11 6",
                "denominacion" => "Entre Ríos",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "C11",
                "codigo" => "3 11 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ARN",
                "codigo" => "3 12",
                "denominacion" => "ARANI",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ARA",
                "codigo" => "3 12 1",
                "denominacion" => "Arani",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "VAC",
                "codigo" => "3 12 2",
                "denominacion" => "Vacas",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "C12",
                "codigo" => "3 12 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ARU",
                "codigo" => "3 13",
                "denominacion" => "ARQUE",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ARQ",
                "codigo" => "3 13 1",
                "denominacion" => "Arque",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TPY",
                "codigo" => "3 13 2",
                "denominacion" => "Tacopaya",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "C13",
                "codigo" => "3 13 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SBO",
                "codigo" => "3 14",
                "denominacion" => "SIMON BOLIVAR",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "BOL",
                "codigo" => "3 14 1",
                "denominacion" => "Bolívar",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "C14",
                "codigo" => "3 14 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "IRQ",
                "codigo" => "3 15",
                "denominacion" => "TIRAQUE",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TRQ",
                "codigo" => "3 15 1",
                "denominacion" => "Tiraque",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SHI",
                "codigo" => "3 15 2",
                "denominacion" => "Shinahota",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "C15",
                "codigo" => "3 15 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MZQ",
                "codigo" => "3 16",
                "denominacion" => "MIZQUE",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MIZ",
                "codigo" => "3 16 1",
                "denominacion" => "Mizque",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "VIS",
                "codigo" => "3 16 2",
                "denominacion" => "Vila Vila",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ALA",
                "codigo" => "3 16 3",
                "denominacion" => "Alalay",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "C16",
                "codigo" => "3 16 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MP3",
                "codigo" => "3 31",
                "denominacion" => "MULTIPROVINCIAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CM1",
                "codigo" => "3 31 31",
                "denominacion" => "MULTIMUNICIPAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ORU",
                "codigo" => "4",
                "denominacion" => "ORURO",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CRO",
                "codigo" => "4 1",
                "denominacion" => "CERCADO",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ORU",
                "codigo" => "4 1 1",
                "denominacion" => "Oruro",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CAR",
                "codigo" => "4 1 2",
                "denominacion" => "Caracollo",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CHO",
                "codigo" => "4 1 3",
                "denominacion" => "El Choro",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SRC",
                "codigo" => "4 1 4",
                "denominacion" => "Soracachi",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "D01",
                "codigo" => "4 1 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "AVA",
                "codigo" => "4 2",
                "denominacion" => "EDUARDO ABAROA",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CHT",
                "codigo" => "4 2 1",
                "denominacion" => "Challapata",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "STQ",
                "codigo" => "4 2 2",
                "denominacion" => "Santuario de Quillacas",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "D02",
                "codigo" => "4 2 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "DAL",
                "codigo" => "4 3",
                "denominacion" => "PANTALEON DALENCE",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "VHU",
                "codigo" => "4 3 1",
                "denominacion" => "Huanuni",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MAR",
                "codigo" => "4 3 2",
                "denominacion" => "Machacamarca",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "D03",
                "codigo" => "4 3 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "POO",
                "codigo" => "4 4",
                "denominacion" => "POOPO",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "POO",
                "codigo" => "4 4 1",
                "denominacion" => "Poopó (Villa Poopó)",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PAZ",
                "codigo" => "4 4 2",
                "denominacion" => "Pazña",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ANT",
                "codigo" => "4 4 3",
                "denominacion" => "Antequera",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "D04",
                "codigo" => "4 4 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "BAR",
                "codigo" => "4 5",
                "denominacion" => "TOMAS BARRON",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "EUC",
                "codigo" => "4 5 1",
                "denominacion" => "Eucaliptus",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "D05",
                "codigo" => "4 5 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SPG",
                "codigo" => "4 6",
                "denominacion" => "SEBASTIÁN PAGADOR",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SHU",
                "codigo" => "4 6 1",
                "denominacion" => "Santiago de Huari",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "D06",
                "codigo" => "4 6 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "STO",
                "codigo" => "4 7",
                "denominacion" => "SAN PEDRO DE TOTORA",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TTR",
                "codigo" => "4 7 1",
                "denominacion" => "Totora",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "D07",
                "codigo" => "4 7 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CRG",
                "codigo" => "4 8",
                "denominacion" => "CARANGAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CRQ",
                "codigo" => "4 8 1",
                "denominacion" => "Corque",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CHE",
                "codigo" => "4 8 2",
                "denominacion" => "Choquecota",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "D08",
                "codigo" => "4 8 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SJM",
                "codigo" => "4 9",
                "denominacion" => "SAJAMA",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CDC",
                "codigo" => "4 9 1",
                "denominacion" => "Curahuara de Carangas",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TUR",
                "codigo" => "4 9 2",
                "denominacion" => "Turco",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "D09",
                "codigo" => "4 9 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "LIT",
                "codigo" => "4 10",
                "denominacion" => "LITORAL DE ATACAMA",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "HCH",
                "codigo" => "4 10 1",
                "denominacion" => "Huachacalla",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ESA",
                "codigo" => "4 10 2",
                "denominacion" => "Escara",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CMA",
                "codigo" => "4 10 3",
                "denominacion" => "Cruz de Machacamarca",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "YUG",
                "codigo" => "4 10 4",
                "denominacion" => "Yunguyo de Litoral",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ESM",
                "codigo" => "4 10 5",
                "denominacion" => "Esmeralda",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "D10",
                "codigo" => "4 10 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SCR",
                "codigo" => "4 11",
                "denominacion" => "SAUCARI",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TOL",
                "codigo" => "4 11 1",
                "denominacion" => "Toledo",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "D11",
                "codigo" => "4 11 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SCA",
                "codigo" => "4 12",
                "denominacion" => "SUD CARANGAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "AND",
                "codigo" => "4 12 1",
                "denominacion" => "Andamarca (Santiago de Andamarca)",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "BEL",
                "codigo" => "4 12 2",
                "denominacion" => "Belén de Andamarca",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "D12",
                "codigo" => "4 12 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CBR",
                "codigo" => "4 13",
                "denominacion" => "LADISLAO CABRERA",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SAL",
                "codigo" => "4 13 1",
                "denominacion" => "Salinas de Garci Mendoza",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PAM",
                "codigo" => "4 13 2",
                "denominacion" => "Pampa Aullagas",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "D13",
                "codigo" => "4 13 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MEJ",
                "codigo" => "4 14",
                "denominacion" => "PUERTO DE MEJILLONES",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "RIV",
                "codigo" => "4 14 1",
                "denominacion" => "La Rivera",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TOS",
                "codigo" => "4 14 2",
                "denominacion" => "Todos Santos",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CGA",
                "codigo" => "4 14 3",
                "denominacion" => "Carangas",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "D14",
                "codigo" => "4 14 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ATA",
                "codigo" => "4 15",
                "denominacion" => "ATAHUALLPA",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SAB",
                "codigo" => "4 15 1",
                "denominacion" => "Sabaya",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "COI",
                "codigo" => "4 15 2",
                "denominacion" => "Coipasa",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CHP",
                "codigo" => "4 15 3",
                "denominacion" => "Chipaya",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "D15",
                "codigo" => "4 15 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "NCA",
                "codigo" => "4 16",
                "denominacion" => "NOR CARANGAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SDH",
                "codigo" => "4 16 1",
                "denominacion" => "Huayllamarca (Santiago de Huayllamarca)",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "D16",
                "codigo" => "4 16 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MP4",
                "codigo" => "4 31",
                "denominacion" => "MULTIPROVINCIAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "DM1",
                "codigo" => "4 31 31",
                "denominacion" => "MULTIMUNICIPAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PTS",
                "codigo" => "5",
                "denominacion" => "POTOSI",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "FRI",
                "codigo" => "5 1",
                "denominacion" => "TOMAS FRIAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "POT",
                "codigo" => "5 1 1",
                "denominacion" => "Potosí",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TIN",
                "codigo" => "5 1 2",
                "denominacion" => "Tinguipaya",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "YOC",
                "codigo" => "5 1 3",
                "denominacion" => "Yocalla",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "URM",
                "codigo" => "5 1 4",
                "denominacion" => "Urmiri",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "E01",
                "codigo" => "5 1 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "BUS",
                "codigo" => "5 2",
                "denominacion" => "RAFAEL BUSTILLOS",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "UNC",
                "codigo" => "5 2 1",
                "denominacion" => "Uncía",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CHY",
                "codigo" => "5 2 2",
                "denominacion" => "Chayanta",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "LLA",
                "codigo" => "5 2 3",
                "denominacion" => "Llallagua",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "JUC",
                "codigo" => "5 2 4",
                "denominacion" => "Chuquihuta Ayllu Jucumani",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "E02",
                "codigo" => "5 2 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SAV",
                "codigo" => "5 3",
                "denominacion" => "CORNELIO SAAVEDRA",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "BET",
                "codigo" => "5 3 1",
                "denominacion" => "Betanzos",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CHQ",
                "codigo" => "5 3 2",
                "denominacion" => "Chaqui",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TCB",
                "codigo" => "5 3 3",
                "denominacion" => "Tacobamba",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "E03",
                "codigo" => "5 3 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CYT",
                "codigo" => "5 4",
                "denominacion" => "CHAYANTA",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CCQ",
                "codigo" => "5 4 1",
                "denominacion" => "Colquechaca",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "RAV",
                "codigo" => "5 4 2",
                "denominacion" => "Ravelo",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PCT",
                "codigo" => "5 4 3",
                "denominacion" => "Pocoata",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "OCU",
                "codigo" => "5 4 4",
                "denominacion" => "Ocurí",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "E04",
                "codigo" => "5 4 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CRC",
                "codigo" => "5 5",
                "denominacion" => "CHARCAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PED",
                "codigo" => "5 5 1",
                "denominacion" => "San Pedro",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TTO",
                "codigo" => "5 5 2",
                "denominacion" => "Toro Toro",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "E05",
                "codigo" => "5 5 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "NCH",
                "codigo" => "5 6",
                "denominacion" => "NOR CHICHAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "COT",
                "codigo" => "5 6 1",
                "denominacion" => "Cotagaita",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "VIT",
                "codigo" => "5 6 2",
                "denominacion" => "Vitichi",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "E06",
                "codigo" => "5 6 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SCH",
                "codigo" => "5 7",
                "denominacion" => "SUR CHICHAS",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TUP",
                "codigo" => "5 7 1",
                "denominacion" => "Tupiza",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ATO",
                "codigo" => "5 7 2",
                "denominacion" => "Atocha",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "E07",
                "codigo" => "5 7 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "NLI",
                "codigo" => "5 8",
                "denominacion" => "NOR LIPEZ",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CCK",
                "codigo" => "5 8 1",
                "denominacion" => "Colcha \"K\" (Villa Martín)",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PEQ",
                "codigo" => "5 8 2",
                "denominacion" => "San Pedro de Quemes",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "E08",
                "codigo" => "5 8 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SLI",
                "codigo" => "5 9",
                "denominacion" => "SUR LIPEZ",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PAB",
                "codigo" => "5 9 1",
                "denominacion" => "San Pablo de Lípez",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MOJ",
                "codigo" => "5 9 2",
                "denominacion" => "Mojinete",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SAT",
                "codigo" => "5 9 3",
                "denominacion" => "San Antonio de Esmoruco",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "E09",
                "codigo" => "5 9 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "IBA",
                "codigo" => "5 10",
                "denominacion" => "ALONSO DE IBAÑEZ",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SAC",
                "codigo" => "5 10 1",
                "denominacion" => "Sacaca (Villa de Sacaca)",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CRP",
                "codigo" => "5 10 2",
                "denominacion" => "Caripuyo",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "E10",
                "codigo" => "5 10 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "LIN",
                "codigo" => "5 11",
                "denominacion" => "JOSE MARIA LINARES",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PUN",
                "codigo" => "5 11 1",
                "denominacion" => "Puna (Villa Talavera)",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CAD",
                "codigo" => "5 11 2",
                "denominacion" => "Caiza \"D\"",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CKO",
                "codigo" => "5 11 3",
                "denominacion" => "Ckochas",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "E11",
                "codigo" => "5 11 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "QUJ",
                "codigo" => "5 12",
                "denominacion" => "ANTONIO QUIJARRO",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "UYU",
                "codigo" => "5 12 1",
                "denominacion" => "Uyuni",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TOM",
                "codigo" => "5 12 2",
                "denominacion" => "Tomave",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PRC",
                "codigo" => "5 12 3",
                "denominacion" => "Porco",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "E12",
                "codigo" => "5 12 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "BIL",
                "codigo" => "5 13",
                "denominacion" => "GENERAL BERNARDINO BILBAO",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ARP",
                "codigo" => "5 13 1",
                "denominacion" => "Arampampa",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ACA",
                "codigo" => "5 13 2",
                "denominacion" => "Acasio",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "E13",
                "codigo" => "5 13 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "DCA",
                "codigo" => "5 14",
                "denominacion" => "DANIEL CAMPOS",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "LLI",
                "codigo" => "5 14 1",
                "denominacion" => "Llica",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TAH",
                "codigo" => "5 14 2",
                "denominacion" => "Tahua",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "E14",
                "codigo" => "5 14 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "OMI",
                "codigo" => "5 15",
                "denominacion" => "MODESTO OMISTE",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "VLZ",
                "codigo" => "5 15 1",
                "denominacion" => "Villazón",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "E15",
                "codigo" => "5 15 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "EBA",
                "codigo" => "5 16",
                "denominacion" => "ENRIQUE BALDIVIESO",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "AGU",
                "codigo" => "5 16 1",
                "denominacion" => "San Agustín",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "E16",
                "codigo" => "5 16 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MP5",
                "codigo" => "5 31",
                "denominacion" => "MULTIPROVINCIAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "EM1",
                "codigo" => "5 31 31",
                "denominacion" => "MULTIMUNICIPAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "F01",
                "codigo" => "6 1 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ARC",
                "codigo" => "6 2",
                "denominacion" => "ANICETO ARCE",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PCY",
                "codigo" => "6 2 1",
                "denominacion" => "Padcaya",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "BER",
                "codigo" => "6 2 2",
                "denominacion" => "Bermejo",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "F02",
                "codigo" => "6 2 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "GCH",
                "codigo" => "6 3",
                "denominacion" => "GRAN CHACO",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "YCB",
                "codigo" => "6 3 1",
                "denominacion" => "Yacuiba",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CRY",
                "codigo" => "6 3 2",
                "denominacion" => "Caraparí",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MON",
                "codigo" => "6 3 3",
                "denominacion" => "Villamontes",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "F03",
                "codigo" => "6 3 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "RAGC",
                "codigo" => "6 3 41",
                "denominacion" => "Región Autónoma del Gran Chaco",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "AVI",
                "codigo" => "6 4",
                "denominacion" => "JOSE MARIA AVILES",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ORI",
                "codigo" => "6 4 1",
                "denominacion" => "Uriondo (Concepción)",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "YUN",
                "codigo" => "6 4 2",
                "denominacion" => "Yunchara",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "F04",
                "codigo" => "6 4 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MEN",
                "codigo" => "6 5",
                "denominacion" => "EUSTAQUIO MENDEZ",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SLR",
                "codigo" => "6 5 1",
                "denominacion" => "San Lorenzo",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TMY",
                "codigo" => "6 5 2",
                "denominacion" => "El Puente",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "F05",
                "codigo" => "6 5 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "OCO",
                "codigo" => "6 6",
                "denominacion" => "BURNET OCONNOR",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "RIO",
                "codigo" => "6 6 1",
                "denominacion" => "Entre Ríos",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "F06",
                "codigo" => "6 6 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MP6",
                "codigo" => "6 31",
                "denominacion" => "MULTIPROVINCIAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "FM1",
                "codigo" => "6 31 31",
                "denominacion" => "MULTIMUNICIPAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SCZ",
                "codigo" => "7",
                "denominacion" => "SANTA CRUZ",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "IBN",
                "codigo" => "7 1",
                "denominacion" => "ANDRES IBAÑEZ",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SCZ",
                "codigo" => "7 1 1",
                "denominacion" => "Santa Cruz de la Sierra",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CTC",
                "codigo" => "7 1 2",
                "denominacion" => "Cotoca",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PRG",
                "codigo" => "7 1 3",
                "denominacion" => "Porongo (Ayacucho)",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "LGU",
                "codigo" => "7 1 4",
                "denominacion" => "La Guardia",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TOR",
                "codigo" => "7 1 5",
                "denominacion" => "El Torno",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "G01",
                "codigo" => "7 1 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "WAR",
                "codigo" => "7 2",
                "denominacion" => "IGNACIO WARNES",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "WAR",
                "codigo" => "7 2 1",
                "denominacion" => "Warnes",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "OKI",
                "codigo" => "7 2 2",
                "denominacion" => "Okinawa Uno",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "G02",
                "codigo" => "7 2 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "VEL",
                "codigo" => "7 3",
                "denominacion" => "JOSE MIGUEL DE VELASCO",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ING",
                "codigo" => "7 3 1",
                "denominacion" => "San Ignacio (San Ignacio de Velasco)",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MIG",
                "codigo" => "7 3 2",
                "denominacion" => "San Miguel (San Miguel de Velasco)",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "RAF",
                "codigo" => "7 3 3",
                "denominacion" => "San Rafael",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "G03",
                "codigo" => "7 3 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ICHI",
                "codigo" => "7 4",
                "denominacion" => "ICHILO",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "BUE",
                "codigo" => "7 4 1",
                "denominacion" => "Buena Vista",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CRL",
                "codigo" => "7 4 2",
                "denominacion" => "San Carlos",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "YAP",
                "codigo" => "7 4 3",
                "denominacion" => "Yapacaní",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SJU",
                "codigo" => "7 4 4",
                "denominacion" => "San Juan",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "G04",
                "codigo" => "7 4 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CIQ",
                "codigo" => "7 5",
                "denominacion" => "CHIQUITOS",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "JOS",
                "codigo" => "7 5 1",
                "denominacion" => "San José",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PAI",
                "codigo" => "7 5 2",
                "denominacion" => "Pailón",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ROB",
                "codigo" => "7 5 3",
                "denominacion" => "Roboré",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "G05",
                "codigo" => "7 5 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SAR",
                "codigo" => "7 6",
                "denominacion" => "SARA",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PCH",
                "codigo" => "7 6 1",
                "denominacion" => "Portachuelo",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SRS",
                "codigo" => "7 6 2",
                "denominacion" => "Santa Rosa del Sara",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CBE",
                "codigo" => "7 6 3",
                "denominacion" => "Colpa Bélgica",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "G06",
                "codigo" => "7 6 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "COR",
                "codigo" => "7 7",
                "denominacion" => "CORDILLERA",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "LAG",
                "codigo" => "7 7 1",
                "denominacion" => "Lagunillas",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CAB",
                "codigo" => "7 7 3",
                "denominacion" => "Cabezas",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CUE",
                "codigo" => "7 7 4",
                "denominacion" => "Cuevo",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "GUT",
                "codigo" => "7 7 5",
                "denominacion" => "Gutiérrez",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CMR",
                "codigo" => "7 7 6",
                "denominacion" => "Camiri",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "BOY",
                "codigo" => "7 7 7",
                "denominacion" => "Boyuibe",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "G07",
                "codigo" => "7 7 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TCH",
                "codigo" => "7 7 37",
                "denominacion" => "TIOC Charagua",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "VAL",
                "codigo" => "7 8",
                "denominacion" => "VALLEGRANDE",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "GRA",
                "codigo" => "7 8 1",
                "denominacion" => "Vallegrande",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TRG",
                "codigo" => "7 8 2",
                "denominacion" => "Trigal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MOR",
                "codigo" => "7 8 3",
                "denominacion" => "Moro Moro",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "POS",
                "codigo" => "7 8 4",
                "denominacion" => "Postrer Valle",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PCR",
                "codigo" => "7 8 5",
                "denominacion" => "Pucara",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "G08",
                "codigo" => "7 8 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "FLO",
                "codigo" => "7 9",
                "denominacion" => "FLORIDA",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SAM",
                "codigo" => "7 9 1",
                "denominacion" => "Samaipata",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PAG",
                "codigo" => "7 9 2",
                "denominacion" => "Pampa Grande",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MAY",
                "codigo" => "7 9 3",
                "denominacion" => "Mairana",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "QRS",
                "codigo" => "7 9 4",
                "denominacion" => "Quirusillas",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "G09",
                "codigo" => "7 9 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SNT",
                "codigo" => "7 10",
                "denominacion" => "OBISPO SANTIESTEBAN",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MTR",
                "codigo" => "7 10 1",
                "denominacion" => "Montero",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SAA",
                "codigo" => "7 10 2",
                "denominacion" => "General Agustín Saavedra",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MIN",
                "codigo" => "7 10 3",
                "denominacion" => "Mineros",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "FAL",
                "codigo" => "7 10 4",
                "denominacion" => "Fernández Alonso",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PDR",
                "codigo" => "7 10 5",
                "denominacion" => "San Pedro",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "G10",
                "codigo" => "7 10 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CHV",
                "codigo" => "7 11",
                "denominacion" => "ÑUFLO DE CHAVEZ",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CON",
                "codigo" => "7 11 1",
                "denominacion" => "Concepción",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SJA",
                "codigo" => "7 11 2",
                "denominacion" => "San Javier",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SRA",
                "codigo" => "7 11 3",
                "denominacion" => "San Ramón",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "JUL",
                "codigo" => "7 11 4",
                "denominacion" => "San Julian",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ANL",
                "codigo" => "7 11 5",
                "denominacion" => "San Antonio de Lomerio",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CCA",
                "codigo" => "7 11 6",
                "denominacion" => "Cuatro Cañadas",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "G11",
                "codigo" => "7 11 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SND",
                "codigo" => "7 12",
                "denominacion" => "ANGEL SANDOVAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MAT",
                "codigo" => "7 12 1",
                "denominacion" => "San Matías",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "G12",
                "codigo" => "7 12 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CBL",
                "codigo" => "7 13",
                "denominacion" => "MANUEL MARIA CABALLERO",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CMP",
                "codigo" => "7 13 1",
                "denominacion" => "Comarapa",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SAI",
                "codigo" => "7 13 2",
                "denominacion" => "Saipina",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "G13",
                "codigo" => "7 13 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "GBU",
                "codigo" => "7 14",
                "denominacion" => "GERMAN BUSCH",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SUA",
                "codigo" => "7 14 1",
                "denominacion" => "Puerto Suárez",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PQO",
                "codigo" => "7 14 2",
                "denominacion" => "Puerto Quijarro",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CRT",
                "codigo" => "7 14 3",
                "denominacion" => "El Carmen Rivero Tórrez",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "G14",
                "codigo" => "7 14 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ADG",
                "codigo" => "7 15 1",
                "denominacion" => "Ascención de Guarayos",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "URU",
                "codigo" => "7 15 2",
                "denominacion" => "Urubicha",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PUE",
                "codigo" => "7 15 3",
                "denominacion" => "El Puente",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "G15",
                "codigo" => "7 15 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MP7",
                "codigo" => "7 31",
                "denominacion" => "MULTIPROVINCIAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "GM1",
                "codigo" => "7 31 31",
                "denominacion" => "MULTIMUNICIPAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "BEN",
                "codigo" => "8",
                "denominacion" => "BENI",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CER",
                "codigo" => "8 1",
                "denominacion" => "CERCADO",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "TRI",
                "codigo" => "8 1 1",
                "denominacion" => "Trinidad",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "JAV",
                "codigo" => "8 1 2",
                "denominacion" => "San Javier",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "H01",
                "codigo" => "8 1 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "VDI",
                "codigo" => "8 2",
                "denominacion" => "VACA DIEZ",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "RIB",
                "codigo" => "8 2 1",
                "denominacion" => "Riberalta",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PGU",
                "codigo" => "8 2 2",
                "denominacion" => "Puerto Guayaramerín",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "H02",
                "codigo" => "8 2 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "JBA",
                "codigo" => "8 3",
                "denominacion" => "JOSE BALLIVIAN",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "REY",
                "codigo" => "8 3 1",
                "denominacion" => "Reyes",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "BOR",
                "codigo" => "8 3 2",
                "denominacion" => "San Borja",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ROS",
                "codigo" => "8 3 3",
                "denominacion" => "Santa Rosa",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "RUR",
                "codigo" => "8 3 4",
                "denominacion" => "Puerto Rurrenabaque",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "H03",
                "codigo" => "8 3 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "YAC",
                "codigo" => "8 4",
                "denominacion" => "YACUMA",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ANA",
                "codigo" => "8 4 1",
                "denominacion" => "Santa Ana",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "EXA",
                "codigo" => "8 4 2",
                "denominacion" => "Exaltación",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "H04",
                "codigo" => "8 4 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MOX",
                "codigo" => "8 5",
                "denominacion" => "MOXOS",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "IGN",
                "codigo" => "8 5 1",
                "denominacion" => "San Ignacio",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "H05",
                "codigo" => "8 5 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MRB",
                "codigo" => "8 6",
                "denominacion" => "MARBAN",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "LOR",
                "codigo" => "8 6 1",
                "denominacion" => "Loreto",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SAD",
                "codigo" => "8 6 2",
                "denominacion" => "San Andrés",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "H06",
                "codigo" => "8 6 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MMR",
                "codigo" => "8 7",
                "denominacion" => "MAMORE",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "JOA",
                "codigo" => "8 7 1",
                "denominacion" => "San Joaquín",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "RAM",
                "codigo" => "8 7 2",
                "denominacion" => "San Ramón",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SIL",
                "codigo" => "8 7 3",
                "denominacion" => "Puerto Siles",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "H07",
                "codigo" => "8 7 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ITE",
                "codigo" => "8 8",
                "denominacion" => "ITENEZ",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MAG",
                "codigo" => "8 8 1",
                "denominacion" => "Magdalena",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "BAU",
                "codigo" => "8 8 2",
                "denominacion" => "Baures",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "HUA",
                "codigo" => "8 8 3",
                "denominacion" => "Huacaraje",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "H08",
                "codigo" => "8 8 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MP8",
                "codigo" => "8 31",
                "denominacion" => "MULTIPROVINCIAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "HM1",
                "codigo" => "8 31 31",
                "denominacion" => "MULTIMUNICIPAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PAN",
                "codigo" => "9",
                "denominacion" => "PANDO",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SUA",
                "codigo" => "9 1",
                "denominacion" => "NICOLAS SUAREZ",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "CBJ",
                "codigo" => "9 1 1",
                "denominacion" => "Cobija",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PRV",
                "codigo" => "9 1 2",
                "denominacion" => "Porvenir",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "BOP",
                "codigo" => "9 1 3",
                "denominacion" => "Bolpebra",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "FLO",
                "codigo" => "9 1 4",
                "denominacion" => "Bella Flor",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "I01",
                "codigo" => "9 1 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MNU",
                "codigo" => "9 2",
                "denominacion" => "MANURIPI",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PRI",
                "codigo" => "9 2 1",
                "denominacion" => "Puerto Rico",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SPE",
                "codigo" => "9 2 2",
                "denominacion" => "San Pedro",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "FIL",
                "codigo" => "9 2 3",
                "denominacion" => "Filadelfia",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "I02",
                "codigo" => "9 2 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MDD",
                "codigo" => "9 3",
                "denominacion" => "MADRE DE DIOS",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "PGM",
                "codigo" => "9 3 1",
                "denominacion" => "Puerto Gonzalo Moreno",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SLO",
                "codigo" => "9 3 2",
                "denominacion" => "San Lorenzo",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SEN",
                "codigo" => "9 3 3",
                "denominacion" => "Sena",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "I03",
                "codigo" => "9 3 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ABN",
                "codigo" => "9 4",
                "denominacion" => "ABUNA",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "SRO",
                "codigo" => "9 4 1",
                "denominacion" => "Santa Rosa del Abuná",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "HUM",
                "codigo" => "9 4 2",
                "denominacion" => "Ingavi (Humaita)",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "I04",
                "codigo" => "9 4 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "ROM",
                "codigo" => "9 5",
                "denominacion" => "GENERAL FEDERICO ROMAN",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "NES",
                "codigo" => "9 5 1",
                "denominacion" => "Nueva Esperanza",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "LOM",
                "codigo" => "9 5 2",
                "denominacion" => "Villa Nueva (Loma Alta)",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MER",
                "codigo" => "9 5 3",
                "denominacion" => "Santos Mercado",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "I05",
                "codigo" => "9 5 31",
                "denominacion" => "Multimunicipal",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MP9",
                "codigo" => "9 31",
                "denominacion" => "MULTIPROVINCIAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "IM1",
                "codigo" => "9 31 31",
                "denominacion" => "MULTIMUNICIPAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "NAL",
                "codigo" => "10",
                "denominacion" => "NACIONAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MP10",
                "codigo" => "10 31",
                "denominacion" => "MULTIPROVINCIAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "M10",
                "codigo" => "10 31 31",
                "denominacion" => "MULTIMUNICIPAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "BNL",
                "codigo" => "11",
                "denominacion" => "BINACIONAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "BDP",
                "codigo" => "20",
                "denominacion" => "BIDEPARTAMENTAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "M20",
                "codigo" => "20 31",
                "denominacion" => "MULTIPROVINCIAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "MDP",
                "codigo" => "21",
                "denominacion" => "MULTIDEPARTAMENTAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "M21",
                "codigo" => "21 31",
                "denominacion" => "MULTIPROVINCIAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 8
            ],
            [
                "sigla" => "OC",
                "codigo" => "01",
                "denominacion" => "OFICINA CENTRAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 9
            ],
            [
                "sigla" => "CH",
                "codigo" => "02",
                "denominacion" => "CHUQUISACA",
                "descripcion" => "-",
                "fk_id_clasificador" => 9
            ],
            [
                "sigla" => "LP",
                "codigo" => "03",
                "denominacion" => "LA PAZ",
                "descripcion" => "-",
                "fk_id_clasificador" => 9
            ],
            [
                "sigla" => "CB",
                "codigo" => "04",
                "denominacion" => "COCHABAMBA",
                "descripcion" => "-",
                "fk_id_clasificador" => 9
            ],
            [
                "sigla" => "OR",
                "codigo" => "04",
                "denominacion" => "ORURO",
                "descripcion" => "-",
                "fk_id_clasificador" => 9
            ],
            [
                "sigla" => "PT",
                "codigo" => "05",
                "denominacion" => "POTOSI",
                "descripcion" => "-",
                "fk_id_clasificador" => 9
            ],
            [
                "sigla" => "TJ",
                "codigo" => "06",
                "denominacion" => "TARIJA",
                "descripcion" => "-",
                "fk_id_clasificador" => 9
            ],
            [
                "sigla" => "SC",
                "codigo" => "08",
                "denominacion" => "SANTA CRUZ",
                "descripcion" => "-",
                "fk_id_clasificador" => 9
            ],
            [
                "sigla" => "BN",
                "codigo" => "08",
                "denominacion" => "BENI",
                "descripcion" => "-",
                "fk_id_clasificador" => 9
            ],
            [
                "sigla" => "PN",
                "codigo" => "10",
                "denominacion" => "PANDO",
                "descripcion" => "-",
                "fk_id_clasificador" => 9
            ],
            [
                "sigla" => "-",
                "codigo" => "00",
                "denominacion" => "GASTO CORRIENTE",
                "descripcion" => "-",
                "fk_id_clasificador" => 10
            ],
            [
                "sigla" => "-",
                "codigo" => "11",
                "denominacion" => "CONSTRUCCION",
                "descripcion" => "-",
                "fk_id_clasificador" => 10
            ],
            [
                "sigla" => "-",
                "codigo" => "12",
                "denominacion" => "REHABILITACION",
                "descripcion" => "-",
                "fk_id_clasificador" => 10
            ],
            [
                "sigla" => "-",
                "codigo" => "13",
                "denominacion" => "CONSERVACION VIAL",
                "descripcion" => "-",
                "fk_id_clasificador" => 10
            ],
            [
                "sigla" => "-",
                "codigo" => "34",
                "denominacion" => "34",
                "descripcion" => "-",
                "fk_id_clasificador" => 10
            ],
            [
                "sigla" => "-",
                "codigo" => "10",
                "denominacion" => "10",
                "descripcion" => "-",
                "fk_id_clasificador" => 10
            ],
            [
                "sigla" => "-",
                "codigo" => "30",
                "denominacion" => "30",
                "descripcion" => "-",
                "fk_id_clasificador" => 10
            ]
        ]);
    }
}
