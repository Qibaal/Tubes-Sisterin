--
-- PostgreSQL database dump
--

-- Dumped from database version 16.2
-- Dumped by pg_dump version 16.2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: req_status; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.req_status AS ENUM (
    'pending',
    'approved',
    'rejected'
);


ALTER TYPE public.req_status OWNER TO postgres;

--
-- Name: user_role; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.user_role AS ENUM (
    'admin',
    'user'
);


ALTER TYPE public.user_role OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: adoption_requests; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.adoption_requests (
    id integer NOT NULL,
    user_id integer NOT NULL,
    animal_id integer NOT NULL,
    income character varying,
    living_type character varying,
    has_pets boolean,
    reason text,
    status public.req_status DEFAULT 'pending'::public.req_status NOT NULL,
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);


ALTER TABLE public.adoption_requests OWNER TO postgres;

--
-- Name: adoption_requests_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.adoption_requests_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.adoption_requests_id_seq OWNER TO postgres;

--
-- Name: adoption_requests_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.adoption_requests_id_seq OWNED BY public.adoption_requests.id;


--
-- Name: cat_needs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cat_needs (
    id integer NOT NULL,
    breed character varying(50) NOT NULL,
    food character varying(100) NOT NULL,
    food_per_day integer NOT NULL,
    treatment character varying(100),
    accessories character varying(100),
    cage character varying(100)
);


ALTER TABLE public.cat_needs OWNER TO postgres;

--
-- Name: cat_needs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.cat_needs_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.cat_needs_id_seq OWNER TO postgres;

--
-- Name: cat_needs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.cat_needs_id_seq OWNED BY public.cat_needs.id;


--
-- Name: cats; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cats (
    id integer NOT NULL,
    name character varying(100) NOT NULL,
    breed character varying(50) NOT NULL,
    age integer,
    health_status character varying(100),
    description text,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    image text
);


ALTER TABLE public.cats OWNER TO postgres;

--
-- Name: cats_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.cats_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.cats_id_seq OWNER TO postgres;

--
-- Name: cats_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.cats_id_seq OWNED BY public.cats.id;


--
-- Name: foods; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.foods (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    price numeric(10,2) NOT NULL,
    image_url text NOT NULL,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    description text,
    stock integer DEFAULT 0 NOT NULL
);


ALTER TABLE public.foods OWNER TO postgres;

--
-- Name: foods_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.foods_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.foods_id_seq OWNER TO postgres;

--
-- Name: foods_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.foods_id_seq OWNED BY public.foods.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id bigint NOT NULL,
    version character varying(255) NOT NULL,
    class character varying(255) NOT NULL,
    "group" character varying(255) NOT NULL,
    namespace character varying(255) NOT NULL,
    "time" integer NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.migrations_id_seq OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: orders; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.orders (
    id integer NOT NULL,
    food_id integer NOT NULL,
    user_id integer NOT NULL,
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);


ALTER TABLE public.orders OWNER TO postgres;

--
-- Name: orders_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.orders_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.orders_id_seq OWNER TO postgres;

--
-- Name: orders_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.orders_id_seq OWNED BY public.orders.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id integer NOT NULL,
    email character varying(100) NOT NULL,
    password_hash character varying(255) NOT NULL,
    full_name character varying(100) NOT NULL,
    phone_number character varying(15),
    address text,
    user_type character varying(10) DEFAULT 'adopter'::character varying,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    role public.user_role DEFAULT 'user'::public.user_role
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: adoption_requests id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.adoption_requests ALTER COLUMN id SET DEFAULT nextval('public.adoption_requests_id_seq'::regclass);


--
-- Name: cat_needs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cat_needs ALTER COLUMN id SET DEFAULT nextval('public.cat_needs_id_seq'::regclass);


--
-- Name: cats id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cats ALTER COLUMN id SET DEFAULT nextval('public.cats_id_seq'::regclass);


--
-- Name: foods id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.foods ALTER COLUMN id SET DEFAULT nextval('public.foods_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: orders id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders ALTER COLUMN id SET DEFAULT nextval('public.orders_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: adoption_requests; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.adoption_requests (id, user_id, animal_id, income, living_type, has_pets, reason, status, created_at, updated_at) FROM stdin;
2	7	1	50000.00	apartment	t	I love animals and want to provide a good home.	pending	\N	\N
3	7	2	45000.00	house	f	I have plenty of space and resources to care for a pet.	approved	\N	\N
4	7	3	60000.00	apartment	t	I have always wanted a cat and can provide a loving environment.	rejected	\N	\N
\.


--
-- Data for Name: cat_needs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cat_needs (id, breed, food, food_per_day, treatment, accessories, cage) FROM stdin;
1	Persian	Premium Dry Cat Food	2	Regular grooming and brushing	Scratching post, toys	Spacious cage with soft bedding
2	Siamese	Grain-Free Wet Cat Food	3	Dental care and regular check-ups	Interactive toys, water fountain	Medium-sized cage with ventilation
3	Maine Coon	High-Protein Dry Food	4	Joint supplements and regular grooming	Large litter box, sturdy scratching post	Large cage with a perch
4	Bengal	Raw Diet or Wet Food	3	Routine vet visits and active play	Climbing tree, laser pointer	Compact cage with climbing options
5	Sphynx	Specialized Diet for Skin Care	2	Frequent bathing and moisturizing	Soft blankets, heated bed	Warm cage with soft bedding
\.


--
-- Data for Name: cats; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cats (id, name, breed, age, health_status, description, created_at, updated_at, image) FROM stdin;
1	Whiskers	Persian	3	Healthy	A playful Persian cat with a fluffy coat.	2024-12-28 12:10:35.912109	2024-12-28 12:10:35.912109	https://www.mygavet.com/sites/default/files/2022-09/Persia.jpg
2	Mittens	Siamese	2	Healthy	A vocal Siamese cat that loves attention.	2024-12-28 12:10:35.912109	2024-12-28 12:10:35.912109	https://upload.wikimedia.org/wikipedia/commons/thumb/2/25/Siam_lilacpoint.jpg/640px-Siam_lilacpoint.jpg
3	Shadow	Maine Coon	5	Needs Vaccination	A large and friendly Maine Coon.	2024-12-28 12:10:35.912109	2024-12-28 12:10:35.912109	https://geniusvets.s3.amazonaws.com/gv-cat-breeds/Maine-Coon-1.jpg
4	Bella	Bengal	4	Healthy	A beautiful Bengal with striking patterns.	2024-12-28 12:10:35.912109	2024-12-28 12:10:35.912109	https://images.ctfassets.net/m5ehn3s5t7ec/wp-image-197606/673d0bc11558a640ec3e388c50770636/How-Much-is-a-Bengal-Cat.webp
5	Luna	Sphynx	1	Special Diet	A hairless Sphynx that needs extra care.	2024-12-28 12:10:35.912109	2024-12-28 12:10:35.912109	https://www.purina.co.id/sites/default/files/2021-02/CAT%20HERO_0026_Sphynx.jpg
\.


--
-- Data for Name: foods; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.foods (id, name, price, image_url, created_at, updated_at, description, stock) FROM stdin;
6	Whiskas Tuna Delight	12.99	https://cdn.onemars.net/sites/whiskas_id_xGoUJ_mwh5/image/whiskas-3d-1-2kg-fop-adult-tunasalmon-2_1713964404624_1720690073265_1723473561293.png	2025-01-05 16:25:15.768149	2025-01-05 16:25:15.768149	A delicious tuna-flavored cat food for adult cats.	0
7	Purina Fancy Feast	15.50	https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full/catalog-image/111/MTA-178384539/purina_purina_fancy_feast_pouch_adult_-_kitten_70_gr_complete_-_balance_nutrition_makanan_kucing_pouch_cat_wet_food_full03_ey8a9hdh.jpg	2025-01-05 16:25:43.133229	2025-01-05 16:25:43.133229	Gourmet wet cat food with chicken and gravy.	0
8	Meow Mix Salmon Treats	8.25	https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9hBVVXhNqIwzgX3nXNZqdsYPKpQ6VXpNY8Q&s	2025-01-05 16:34:02.747657	2025-01-05 16:34:02.747657	Crunchy salmon-flavored treats for all cats.	0
9	Blue Buffalo Chicken & Rice	18.75	https://m.media-amazon.com/images/I/71jQsmvE0pL._AC_UF1000,1000_QL80_.jpg	2025-01-05 16:34:10.380631	2025-01-05 16:34:10.380631	Healthy dry cat food with real chicken and wholesome grains.	0
10	Sheba Perfect Portions	14.99	https://mcgrocer.com/cdn/shop/files/4008429123184.jpg?v=1713738901	2025-01-05 16:34:19.21936	2025-01-05 16:34:19.21936	Wet cat food with salmon and tuna in individual portions.	0
11	Hills Science Diet Kitten	20.00	https://images.tokopedia.net/img/cache/700/hDjmkQ/2023/2/15/f8b91fb8-7a60-47f0-af06-65817786722b.jpg	2025-01-05 16:35:09.946737	2025-01-05 16:35:09.946737	Nutritious food designed specifically for kittens.	0
12	Friskies Indoor Delights	10.99	https://petshopindonesia.com/wp-content/uploads/2022/12/i100058-friskies-indoor-delights-1-1-kg-makanan-kucing-rumahan-1.jpg	2025-01-05 16:35:28.69499	2025-01-05 16:35:28.69499	Specially formulated dry food for indoor cats.	0
13	Royal Canin Hairball Care	22.50	https://petshopindonesia.com/wp-content/uploads/2022/12/ii030051-royal-canin-hairball-care-400gr-makanan-kucing-dewasa-hairball-1-1.jpg	2025-01-05 16:35:37.58802	2025-01-05 16:35:37.58802	Helps cats manage hairballs with balanced nutrition.	0
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, version, class, "group", namespace, "time", batch) FROM stdin;
3	2024-12-27-133857	App\\Database\\Migrations\\CreateAdoptionRequests	default	App	1735307371	3
4	2024-12-28-050838	App\\Database\\Migrations\\CreateCatsTable	default	App	1735362595	4
5	2024-12-28-052021	App\\Database\\Migrations\\CreateCatNeedsTable	default	App	1735363246	5
6	2025-01-05-085223	App\\Database\\Migrations\\CreateFoodsTable	default	App	1736067686	6
7	2025-01-05-085232	App\\Database\\Migrations\\CreateOrdersTable	default	App	1736067686	6
9	2025-01-05-103630	App\\Database\\Migrations\\AddStockToFoods	default	App	1736073503	7
10	2025-01-05-134241	App\\Database\\Migrations\\AddImageColumnToCats	default	App	1736084593	8
\.


--
-- Data for Name: orders; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.orders (id, food_id, user_id, created_at, updated_at) FROM stdin;
1	6	7	2025-01-05 09:37:23	2025-01-05 09:37:23
6	6	7	2025-01-05 13:29:56	2025-01-05 13:29:56
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, email, password_hash, full_name, phone_number, address, user_type, created_at, updated_at, role) FROM stdin;
7	test@test.com	$2y$10$VZ8TdTdAyZed/7xlVlHLyurYbdLftdxuTk9Rh1rnJdxz6M25dUrj2	Raizan Iqbal Resi XXX	081111111111	jl dermaga	adopter	2024-12-26 11:43:01	2024-12-26 14:53:43	user
9	admin@admin.com	$2y$10$glEV7cfR2UKa0Cs43U8kJeVXm6IfGg4LAm7dfgdwt3qc.Uc6ixzRC	Admin	088888888888	Admin ST 1	adopter	2024-12-27 15:07:41.942371	2024-12-27 15:07:41.942371	admin
10	raizan.iqbal@gmail.com	$2y$10$wzQLlb5bpO/TaNTQm4dhW./Gcqv1tMhnI2M60BY8qAGsB1LNVYNxq	Rai Bal	085710915241	Jalan Dermaga raya no.107	adopter	2024-12-28 11:23:00	2024-12-28 11:23:00	user
\.


--
-- Name: adoption_requests_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.adoption_requests_id_seq', 4, true);


--
-- Name: cat_needs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cat_needs_id_seq', 5, true);


--
-- Name: cats_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cats_id_seq', 5, true);


--
-- Name: foods_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.foods_id_seq', 13, true);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 10, true);


--
-- Name: orders_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.orders_id_seq', 6, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 10, true);


--
-- Name: adoption_requests pk_adoption_requests; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.adoption_requests
    ADD CONSTRAINT pk_adoption_requests PRIMARY KEY (id);


--
-- Name: cat_needs pk_cat_needs; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cat_needs
    ADD CONSTRAINT pk_cat_needs PRIMARY KEY (id);


--
-- Name: cats pk_cats; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cats
    ADD CONSTRAINT pk_cats PRIMARY KEY (id);


--
-- Name: foods pk_foods; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.foods
    ADD CONSTRAINT pk_foods PRIMARY KEY (id);


--
-- Name: migrations pk_migrations; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT pk_migrations PRIMARY KEY (id);


--
-- Name: orders pk_orders; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT pk_orders PRIMARY KEY (id);


--
-- Name: users users_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_key UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: adoption_requests adoption_requests_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.adoption_requests
    ADD CONSTRAINT adoption_requests_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: orders orders_food_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_food_id_foreign FOREIGN KEY (food_id) REFERENCES public.foods(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: orders orders_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

