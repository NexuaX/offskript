--
-- PostgreSQL database dump
--

-- Dumped from database version 13.5 (Ubuntu 13.5-2.pgdg20.04+1)
-- Dumped by pg_dump version 13.5

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
-- Name: public; Type: SCHEMA; Schema: -; Owner: ccklhgybucrfpf
--

CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO ccklhgybucrfpf;

--
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: ccklhgybucrfpf
--

COMMENT ON SCHEMA public IS 'standard public schema';


--
-- Name: production_type; Type: TYPE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE TYPE public.production_type AS ENUM (
    'movie',
    'show',
    'game',
    'anime'
);


ALTER TYPE public.production_type OWNER TO ccklhgybucrfpf;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: actors; Type: TABLE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE TABLE public.actors (
    id integer NOT NULL,
    fullname character varying(100) NOT NULL,
    id_picture integer
);


ALTER TABLE public.actors OWNER TO ccklhgybucrfpf;

--
-- Name: actors_id_seq; Type: SEQUENCE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE SEQUENCE public.actors_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.actors_id_seq OWNER TO ccklhgybucrfpf;

--
-- Name: actors_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ccklhgybucrfpf
--

ALTER SEQUENCE public.actors_id_seq OWNED BY public.actors.id;


--
-- Name: attachments; Type: TABLE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE TABLE public.attachments (
    id integer NOT NULL,
    image_src character varying(300)
);


ALTER TABLE public.attachments OWNER TO ccklhgybucrfpf;

--
-- Name: attachments_id_seq; Type: SEQUENCE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE SEQUENCE public.attachments_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.attachments_id_seq OWNER TO ccklhgybucrfpf;

--
-- Name: attachments_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ccklhgybucrfpf
--

ALTER SEQUENCE public.attachments_id_seq OWNED BY public.attachments.id;


--
-- Name: characters; Type: TABLE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE TABLE public.characters (
    id integer NOT NULL,
    name character varying(100) NOT NULL,
    id_actor integer NOT NULL,
    id_picture integer
);


ALTER TABLE public.characters OWNER TO ccklhgybucrfpf;

--
-- Name: characters_id_seq; Type: SEQUENCE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE SEQUENCE public.characters_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.characters_id_seq OWNER TO ccklhgybucrfpf;

--
-- Name: characters_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ccklhgybucrfpf
--

ALTER SEQUENCE public.characters_id_seq OWNED BY public.characters.id;


--
-- Name: directors; Type: TABLE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE TABLE public.directors (
    id integer NOT NULL,
    name character varying(100),
    id_picture integer
);


ALTER TABLE public.directors OWNER TO ccklhgybucrfpf;

--
-- Name: directors_id_seq; Type: SEQUENCE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE SEQUENCE public.directors_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.directors_id_seq OWNER TO ccklhgybucrfpf;

--
-- Name: directors_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ccklhgybucrfpf
--

ALTER SEQUENCE public.directors_id_seq OWNED BY public.directors.id;


--
-- Name: favorite_character; Type: TABLE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE TABLE public.favorite_character (
    id integer NOT NULL,
    id_user integer NOT NULL,
    id_character integer NOT NULL
);


ALTER TABLE public.favorite_character OWNER TO ccklhgybucrfpf;

--
-- Name: favorite_character_id_seq; Type: SEQUENCE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE SEQUENCE public.favorite_character_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.favorite_character_id_seq OWNER TO ccklhgybucrfpf;

--
-- Name: favorite_character_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ccklhgybucrfpf
--

ALTER SEQUENCE public.favorite_character_id_seq OWNED BY public.favorite_character.id;


--
-- Name: favorite_director; Type: TABLE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE TABLE public.favorite_director (
    id integer NOT NULL,
    id_user integer NOT NULL,
    id_director integer NOT NULL
);


ALTER TABLE public.favorite_director OWNER TO ccklhgybucrfpf;

--
-- Name: favorite_director_id_seq; Type: SEQUENCE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE SEQUENCE public.favorite_director_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.favorite_director_id_seq OWNER TO ccklhgybucrfpf;

--
-- Name: favorite_director_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ccklhgybucrfpf
--

ALTER SEQUENCE public.favorite_director_id_seq OWNED BY public.favorite_director.id;


--
-- Name: favorite_studio; Type: TABLE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE TABLE public.favorite_studio (
    id integer NOT NULL,
    id_user integer NOT NULL,
    id_studio integer NOT NULL
);


ALTER TABLE public.favorite_studio OWNER TO ccklhgybucrfpf;

--
-- Name: favorite_studio_id_seq; Type: SEQUENCE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE SEQUENCE public.favorite_studio_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.favorite_studio_id_seq OWNER TO ccklhgybucrfpf;

--
-- Name: favorite_studio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ccklhgybucrfpf
--

ALTER SEQUENCE public.favorite_studio_id_seq OWNED BY public.favorite_studio.id;


--
-- Name: follows; Type: TABLE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE TABLE public.follows (
    id integer NOT NULL,
    id_following_user integer NOT NULL,
    id_followed_user integer NOT NULL
);


ALTER TABLE public.follows OWNER TO ccklhgybucrfpf;

--
-- Name: follows_id_seq; Type: SEQUENCE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE SEQUENCE public.follows_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.follows_id_seq OWNER TO ccklhgybucrfpf;

--
-- Name: follows_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ccklhgybucrfpf
--

ALTER SEQUENCE public.follows_id_seq OWNED BY public.follows.id;


--
-- Name: news; Type: TABLE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE TABLE public.news (
    id integer NOT NULL,
    title character varying(200) NOT NULL,
    id_picture integer,
    date_added date NOT NULL
);


ALTER TABLE public.news OWNER TO ccklhgybucrfpf;

--
-- Name: news_id_seq; Type: SEQUENCE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE SEQUENCE public.news_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.news_id_seq OWNER TO ccklhgybucrfpf;

--
-- Name: news_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ccklhgybucrfpf
--

ALTER SEQUENCE public.news_id_seq OWNED BY public.news.id;


--
-- Name: production_character; Type: TABLE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE TABLE public.production_character (
    id integer NOT NULL,
    id_production integer NOT NULL,
    id_character integer NOT NULL
);


ALTER TABLE public.production_character OWNER TO ccklhgybucrfpf;

--
-- Name: production_character_id_seq; Type: SEQUENCE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE SEQUENCE public.production_character_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.production_character_id_seq OWNER TO ccklhgybucrfpf;

--
-- Name: production_character_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ccklhgybucrfpf
--

ALTER SEQUENCE public.production_character_id_seq OWNED BY public.production_character.id;


--
-- Name: production_director; Type: TABLE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE TABLE public.production_director (
    id integer NOT NULL,
    id_production integer NOT NULL,
    id_director integer NOT NULL
);


ALTER TABLE public.production_director OWNER TO ccklhgybucrfpf;

--
-- Name: production_director_id_seq; Type: SEQUENCE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE SEQUENCE public.production_director_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.production_director_id_seq OWNER TO ccklhgybucrfpf;

--
-- Name: production_director_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ccklhgybucrfpf
--

ALTER SEQUENCE public.production_director_id_seq OWNED BY public.production_director.id;


--
-- Name: productions; Type: TABLE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE TABLE public.productions (
    id integer NOT NULL,
    title character varying(200) NOT NULL,
    synopsis character varying(500),
    date_produced date,
    type public.production_type NOT NULL,
    id_poster integer
);


ALTER TABLE public.productions OWNER TO ccklhgybucrfpf;

--
-- Name: user_watchlist; Type: TABLE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE TABLE public.user_watchlist (
    id integer NOT NULL,
    id_user integer NOT NULL,
    id_production integer NOT NULL,
    mark double precision,
    date_added date NOT NULL,
    review character varying(500),
    is_planned boolean DEFAULT false NOT NULL,
    date_modified date NOT NULL,
    heart boolean DEFAULT false NOT NULL
);


ALTER TABLE public.user_watchlist OWNER TO ccklhgybucrfpf;

--
-- Name: production_stats; Type: VIEW; Schema: public; Owner: ccklhgybucrfpf
--

CREATE VIEW public.production_stats AS
 SELECT p.id,
    p.title,
    p.synopsis,
    p.date_produced,
    p.type,
    p.id_poster,
    a.image_src,
    ( SELECT avg(uw1.mark) AS avg
           FROM public.user_watchlist uw1
          WHERE (uw1.id_production = p.id)) AS mark,
    ( SELECT count(uw2.heart) AS count
           FROM public.user_watchlist uw2
          WHERE ((uw2.id_production = p.id) AND (uw2.heart = true))) AS hearts
   FROM (public.productions p
     LEFT JOIN public.attachments a ON ((p.id_poster = a.id)));


ALTER TABLE public.production_stats OWNER TO ccklhgybucrfpf;

--
-- Name: production_studio; Type: TABLE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE TABLE public.production_studio (
    id integer NOT NULL,
    id_production integer NOT NULL,
    id_studio integer NOT NULL
);


ALTER TABLE public.production_studio OWNER TO ccklhgybucrfpf;

--
-- Name: production_studio_id_seq; Type: SEQUENCE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE SEQUENCE public.production_studio_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.production_studio_id_seq OWNER TO ccklhgybucrfpf;

--
-- Name: production_studio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ccklhgybucrfpf
--

ALTER SEQUENCE public.production_studio_id_seq OWNED BY public.production_studio.id;


--
-- Name: production_tag; Type: TABLE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE TABLE public.production_tag (
    id integer NOT NULL,
    id_production integer NOT NULL,
    id_tag integer NOT NULL
);


ALTER TABLE public.production_tag OWNER TO ccklhgybucrfpf;

--
-- Name: production_tag_id_seq; Type: SEQUENCE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE SEQUENCE public.production_tag_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.production_tag_id_seq OWNER TO ccklhgybucrfpf;

--
-- Name: production_tag_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ccklhgybucrfpf
--

ALTER SEQUENCE public.production_tag_id_seq OWNED BY public.production_tag.id;


--
-- Name: productions_id_seq; Type: SEQUENCE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE SEQUENCE public.productions_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.productions_id_seq OWNER TO ccklhgybucrfpf;

--
-- Name: productions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ccklhgybucrfpf
--

ALTER SEQUENCE public.productions_id_seq OWNED BY public.productions.id;


--
-- Name: studios; Type: TABLE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE TABLE public.studios (
    id integer NOT NULL,
    name character varying(200) NOT NULL,
    id_picture integer
);


ALTER TABLE public.studios OWNER TO ccklhgybucrfpf;

--
-- Name: studios_id_seq; Type: SEQUENCE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE SEQUENCE public.studios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.studios_id_seq OWNER TO ccklhgybucrfpf;

--
-- Name: studios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ccklhgybucrfpf
--

ALTER SEQUENCE public.studios_id_seq OWNED BY public.studios.id;


--
-- Name: table_name; Type: TABLE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE TABLE public.table_name (
    id integer NOT NULL,
    id_user integer NOT NULL,
    id_studio integer NOT NULL
);


ALTER TABLE public.table_name OWNER TO ccklhgybucrfpf;

--
-- Name: table_name_id_seq; Type: SEQUENCE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE SEQUENCE public.table_name_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.table_name_id_seq OWNER TO ccklhgybucrfpf;

--
-- Name: table_name_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ccklhgybucrfpf
--

ALTER SEQUENCE public.table_name_id_seq OWNED BY public.table_name.id;


--
-- Name: tags; Type: TABLE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE TABLE public.tags (
    id integer NOT NULL,
    tag character varying(50) NOT NULL
);


ALTER TABLE public.tags OWNER TO ccklhgybucrfpf;

--
-- Name: tags_id_seq; Type: SEQUENCE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE SEQUENCE public.tags_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tags_id_seq OWNER TO ccklhgybucrfpf;

--
-- Name: tags_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ccklhgybucrfpf
--

ALTER SEQUENCE public.tags_id_seq OWNED BY public.tags.id;


--
-- Name: user_accounts; Type: TABLE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE TABLE public.user_accounts (
    id integer NOT NULL,
    email character varying(100) NOT NULL,
    password character varying(300) NOT NULL,
    username character varying(100) NOT NULL,
    description character varying(500),
    date_last_login date,
    id_avatar integer,
    status character varying(20) DEFAULT 'standard_user'::character varying
);


ALTER TABLE public.user_accounts OWNER TO ccklhgybucrfpf;

--
-- Name: user_accounts_id_seq; Type: SEQUENCE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE SEQUENCE public.user_accounts_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_accounts_id_seq OWNER TO ccklhgybucrfpf;

--
-- Name: user_accounts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ccklhgybucrfpf
--

ALTER SEQUENCE public.user_accounts_id_seq OWNED BY public.user_accounts.id;


--
-- Name: user_stats; Type: VIEW; Schema: public; Owner: ccklhgybucrfpf
--

CREATE VIEW public.user_stats AS
 SELECT ua.id,
    ( SELECT count(*) AS count
           FROM (public.user_watchlist uw
             LEFT JOIN public.productions p ON ((p.id = uw.id_production)))
          WHERE ((uw.id_user = ua.id) AND (uw.is_planned = false) AND (p.type = 'movie'::public.production_type))) AS movies,
    ( SELECT count(*) AS count
           FROM (public.user_watchlist uw
             LEFT JOIN public.productions p ON ((p.id = uw.id_production)))
          WHERE ((uw.id_user = ua.id) AND (uw.is_planned = false) AND (p.type = 'show'::public.production_type))) AS shows,
    ( SELECT count(*) AS count
           FROM (public.user_watchlist uw
             LEFT JOIN public.productions p ON ((p.id = uw.id_production)))
          WHERE ((uw.id_user = ua.id) AND (uw.is_planned = false) AND (p.type = 'anime'::public.production_type))) AS animes,
    ( SELECT count(*) AS count
           FROM (public.user_watchlist uw
             LEFT JOIN public.productions p ON ((p.id = uw.id_production)))
          WHERE ((uw.id_user = ua.id) AND (uw.is_planned = false) AND (p.type = 'game'::public.production_type))) AS games,
    ( SELECT count(uw.review) AS count
           FROM public.user_watchlist uw
          WHERE (uw.id_user = ua.id)) AS reviews,
    ( SELECT count(*) AS count
           FROM public.follows f
          WHERE (f.id_followed_user = ua.id)) AS followers
   FROM public.user_accounts ua;


ALTER TABLE public.user_stats OWNER TO ccklhgybucrfpf;

--
-- Name: user_watchlist_id_seq; Type: SEQUENCE; Schema: public; Owner: ccklhgybucrfpf
--

CREATE SEQUENCE public.user_watchlist_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_watchlist_id_seq OWNER TO ccklhgybucrfpf;

--
-- Name: user_watchlist_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ccklhgybucrfpf
--

ALTER SEQUENCE public.user_watchlist_id_seq OWNED BY public.user_watchlist.id;


--
-- Name: actors id; Type: DEFAULT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.actors ALTER COLUMN id SET DEFAULT nextval('public.actors_id_seq'::regclass);


--
-- Name: attachments id; Type: DEFAULT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.attachments ALTER COLUMN id SET DEFAULT nextval('public.attachments_id_seq'::regclass);


--
-- Name: characters id; Type: DEFAULT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.characters ALTER COLUMN id SET DEFAULT nextval('public.characters_id_seq'::regclass);


--
-- Name: directors id; Type: DEFAULT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.directors ALTER COLUMN id SET DEFAULT nextval('public.directors_id_seq'::regclass);


--
-- Name: favorite_character id; Type: DEFAULT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.favorite_character ALTER COLUMN id SET DEFAULT nextval('public.favorite_character_id_seq'::regclass);


--
-- Name: favorite_director id; Type: DEFAULT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.favorite_director ALTER COLUMN id SET DEFAULT nextval('public.favorite_director_id_seq'::regclass);


--
-- Name: favorite_studio id; Type: DEFAULT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.favorite_studio ALTER COLUMN id SET DEFAULT nextval('public.favorite_studio_id_seq'::regclass);


--
-- Name: follows id; Type: DEFAULT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.follows ALTER COLUMN id SET DEFAULT nextval('public.follows_id_seq'::regclass);


--
-- Name: news id; Type: DEFAULT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.news ALTER COLUMN id SET DEFAULT nextval('public.news_id_seq'::regclass);


--
-- Name: production_character id; Type: DEFAULT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.production_character ALTER COLUMN id SET DEFAULT nextval('public.production_character_id_seq'::regclass);


--
-- Name: production_director id; Type: DEFAULT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.production_director ALTER COLUMN id SET DEFAULT nextval('public.production_director_id_seq'::regclass);


--
-- Name: production_studio id; Type: DEFAULT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.production_studio ALTER COLUMN id SET DEFAULT nextval('public.production_studio_id_seq'::regclass);


--
-- Name: production_tag id; Type: DEFAULT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.production_tag ALTER COLUMN id SET DEFAULT nextval('public.production_tag_id_seq'::regclass);


--
-- Name: productions id; Type: DEFAULT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.productions ALTER COLUMN id SET DEFAULT nextval('public.productions_id_seq'::regclass);


--
-- Name: studios id; Type: DEFAULT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.studios ALTER COLUMN id SET DEFAULT nextval('public.studios_id_seq'::regclass);


--
-- Name: table_name id; Type: DEFAULT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.table_name ALTER COLUMN id SET DEFAULT nextval('public.table_name_id_seq'::regclass);


--
-- Name: tags id; Type: DEFAULT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.tags ALTER COLUMN id SET DEFAULT nextval('public.tags_id_seq'::regclass);


--
-- Name: user_accounts id; Type: DEFAULT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.user_accounts ALTER COLUMN id SET DEFAULT nextval('public.user_accounts_id_seq'::regclass);


--
-- Name: user_watchlist id; Type: DEFAULT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.user_watchlist ALTER COLUMN id SET DEFAULT nextval('public.user_watchlist_id_seq'::regclass);


--
-- Data for Name: actors; Type: TABLE DATA; Schema: public; Owner: ccklhgybucrfpf
--

COPY public.actors (id, fullname, id_picture) FROM stdin;
1	Benedict Cumberbatch	54
2	Martin Freeman	56
\.


--
-- Data for Name: attachments; Type: TABLE DATA; Schema: public; Owner: ccklhgybucrfpf
--

COPY public.attachments (id, image_src) FROM stdin;
1	news-images/news1.jpg
3	news-images/news3.jpg
2	news-images/news2.jpg
4	posters/shawshank.jpg
5	posters/darkknight.jpg
6	directors/nolan.jpg
7	directors/darabont.jpg
8	posters/fellowship.jpg
9	directors/jackson.jpg
10	posters/pulpfiction.jpg
11	directors/tarantino.jpg
12	posters/inception.jpg
14	posters/interstellar.jpg
16	posters/avengers.jpg
15	posters/django.jpg
13	posters/twotowers.jpg
17	directors/arusso.jpg
18	directors/jrusso.jpg
19	directors/scorsese.jpg
20	posters/wolfwallstreet.jpg
21	news-images/news4.jpg
22	news-images/news5.jpg
23	news-images/news8.jpeg
24	news-images/news6.jpg
25	news-images/news7.jpg
26	posters/brba.jpg
27	directors/gilligan.jpg
28	posters/got.jpeg
29	directors/weiss.jpg
30	directors/bienioff.jpg
31	posters/arcane.jpg
33	posters/sherlock.jpg
34	directors/gatiss.jpg
35	directors/moffat.jpg
36	posters/detective.jpg
37	directors/pizzolatto.jpg
38	posters/fma.jpg
39	studios/bones.jpg
40	directors/yasuhiro.jpg
41	posters/gate.jpg
42	studios/fox.jpg
43	directors/hiroshi.jpg
44	posters/black.jpg
45	directors/tensai.jpg
47	avatars/default.jpg
51	avatars/avatar10.jpg
54	actors/benedict.jpg
55	characters/sherlock.png
56	actors/martin.jpg
57	characters/john.jpg
46	posters/skyrim.png
32	studios/riot.png
\.


--
-- Data for Name: characters; Type: TABLE DATA; Schema: public; Owner: ccklhgybucrfpf
--

COPY public.characters (id, name, id_actor, id_picture) FROM stdin;
1	Sherlock Holmes	1	55
2	John Watson	2	57
\.


--
-- Data for Name: directors; Type: TABLE DATA; Schema: public; Owner: ccklhgybucrfpf
--

COPY public.directors (id, name, id_picture) FROM stdin;
1	Frank Darabont	7
2	Christopher Nolan	6
3	Peter Jackson	9
4	Quentin Tarantino	11
5	Anthony Russo	17
6	Joe Russo	18
7	Martin Scorsese	19
8	Vince Gilligan	27
9	D.B. Weiss	29
10	David Benioff	30
11	Mark Gatiss	34
12	Steven Moffat	35
13	Nic Pizzolatto	37
14	Irie, Yasuhiro	40
15	Hamasaki, Hiroshi	43
16	Okamura, Tensai	45
\.


--
-- Data for Name: favorite_character; Type: TABLE DATA; Schema: public; Owner: ccklhgybucrfpf
--

COPY public.favorite_character (id, id_user, id_character) FROM stdin;
\.


--
-- Data for Name: favorite_director; Type: TABLE DATA; Schema: public; Owner: ccklhgybucrfpf
--

COPY public.favorite_director (id, id_user, id_director) FROM stdin;
1	10	11
4	10	1
\.


--
-- Data for Name: favorite_studio; Type: TABLE DATA; Schema: public; Owner: ccklhgybucrfpf
--

COPY public.favorite_studio (id, id_user, id_studio) FROM stdin;
\.


--
-- Data for Name: follows; Type: TABLE DATA; Schema: public; Owner: ccklhgybucrfpf
--

COPY public.follows (id, id_following_user, id_followed_user) FROM stdin;
\.


--
-- Data for Name: news; Type: TABLE DATA; Schema: public; Owner: ccklhgybucrfpf
--

COPY public.news (id, title, id_picture, date_added) FROM stdin;
2	Cartoons are more popular	2	2021-12-21
1	New life for a director	1	2021-12-21
3	Placeholder test	\N	2021-12-21
4	Amazons Lord of the Rings	21	2022-01-02
5	No way home huuuge success!	22	2022-01-02
6	New anniversary version of Skyrim	25	2022-01-02
7	Most anticipated anime! Chainsaw-man.	23	2022-01-02
8	New Star Wars Show!	24	2022-01-02
\.


--
-- Data for Name: production_character; Type: TABLE DATA; Schema: public; Owner: ccklhgybucrfpf
--

COPY public.production_character (id, id_production, id_character) FROM stdin;
1	14	1
2	14	2
\.


--
-- Data for Name: production_director; Type: TABLE DATA; Schema: public; Owner: ccklhgybucrfpf
--

COPY public.production_director (id, id_production, id_director) FROM stdin;
1	1	1
2	2	2
3	5	2
4	7	2
5	3	3
6	6	3
7	4	4
8	8	4
9	9	5
10	9	6
11	10	7
12	11	8
13	12	9
14	12	10
15	14	11
16	14	12
17	15	13
18	16	14
19	17	15
20	18	16
\.


--
-- Data for Name: production_studio; Type: TABLE DATA; Schema: public; Owner: ccklhgybucrfpf
--

COPY public.production_studio (id, id_production, id_studio) FROM stdin;
1	13	1
2	16	2
3	17	3
4	18	2
5	19	4
6	20	5
7	21	5
\.


--
-- Data for Name: production_tag; Type: TABLE DATA; Schema: public; Owner: ccklhgybucrfpf
--

COPY public.production_tag (id, id_production, id_tag) FROM stdin;
1	1	2
2	8	1
3	8	2
4	10	1
5	10	2
6	11	2
7	13	2
8	16	2
9	17	2
10	3	4
11	6	4
12	5	5
13	7	5
14	9	5
15	13	5
16	17	5
17	21	5
\.


--
-- Data for Name: productions; Type: TABLE DATA; Schema: public; Owner: ccklhgybucrfpf
--

COPY public.productions (id, title, synopsis, date_produced, type, id_poster) FROM stdin;
1	The Shawshank Redemption	Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.	1994-01-01	movie	4
2	The Dark Knight	When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.	2008-01-01	movie	5
3	The Lord of the Rings: The Fellowship of the Ring	A meek Hobbit from the Shire and eight companions set out on a journey to destroy the powerful One Ring and save Middle-earth from the Dark Lord Sauron.	2001-01-01	movie	8
4	Pulp Fiction	The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.	1994-01-01	movie	10
5	Inception	A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O., but his tragic past may doom the project and his team to disaster.	2010-01-01	movie	12
6	The Lord of the Rings: The Two Towers	While Frodo and Sam edge closer to Mordor with the help of the shifty Gollum, the divided fellowship makes a stand against Sauron's new ally, Saruman, and his hordes of Isengard.	2002-01-01	movie	13
7	Interstellar	A team of explorers travel through a wormhole in space in an attempt to ensure humanity's survival.	2014-01-01	movie	14
8	Django Unchained	With the help of a German bounty-hunter, a freed slave sets out to rescue his wife from a brutal plantation-owner in Mississippi.	2012-01-01	movie	15
9	Avengers: Infinity War	The Avengers and their allies must be willing to sacrifice all in an attempt to defeat the powerful Thanos before his blitz of devastation and ruin puts an end to the universe.	2018-01-01	movie	16
10	The Wolf of Wall Street	Based on the true story of Jordan Belfort, from his rise to a wealthy stock-broker living the high life to his fall involving crime, corruption and the federal government.	2013-01-01	movie	20
11	Breaking Bad	A high school chemistry teacher diagnosed with inoperable lung cancer turns to manufacturing and selling methamphetamine in order to secure his family's future.	2008-01-01	show	26
12	Game of Thrones	Nine noble families fight for control over the lands of Westeros, while an ancient enemy returns after being dormant for millennia.	2011-01-01	show	28
13	Arcane	Set in utopian Piltover and the oppressed underground of Zaun, the story follows the origins of two iconic League champions-and the power that will tear them apart.	2021-01-01	show	31
14	Sherlock	A modern update finds the famous sleuth and his doctor partner solving crime in 21st century London.	2010-01-01	show	33
15	True Detective	Seasonal anthology series in which police investigations unearth the personal and professional secrets of those involved, both within and outside the law.	2014-01-01	show	36
16	Fullmetal Alchemist: Brotherhood	After a horrific alchemy experiment goes wrong in the Elric household, brothers Edward and Alphonse are left in a catastrophic new reality.	2009-01-01	anime	38
17	Steins;Gate	The self-proclaimed mad scientist Rintarou Okabe rents out a room in a rickety old building in Akihabara, where he indulges himself in his hobby of inventing prospective "future gadgets" with fellow lab members	2011-01-01	anime	41
18	Darker than Black	It has been 10 years since Heaven's Gate appeared in South America and Hell's Gate appeared in Japan, veiling the once familiar night sky with an oppressive skyscape.	2007-01-01	anime	44
19	The Elder Scrolls V: Skyrim	The next chapter in the highly anticipated Elder Scrolls saga arrives from the makers of the 2006 and 2008 Games of the Year, Bethesda Game Studios.	2011-01-01	game	46
20	The Witcher 3: Wild Hunt	RPG and sequel to The Witcher 2 (2011), The Witcher 3 follows witcher Geralt of Rivia as he seeks out his former lover and his young subject while intermingling with the political workings of the wartorn Northern Kingdoms.	2015-01-01	game	\N
21	Cyberpunk 2077	Cyberpunk 2077 is a role-playing video game developed and published by CD Projekt.	2020-01-01	game	\N
\.


--
-- Data for Name: studios; Type: TABLE DATA; Schema: public; Owner: ccklhgybucrfpf
--

COPY public.studios (id, name, id_picture) FROM stdin;
1	Riot Games	32
2	Bones	39
3	White Fox	42
4	Bethesda	\N
5	CD Projekt Red	\N
\.


--
-- Data for Name: table_name; Type: TABLE DATA; Schema: public; Owner: ccklhgybucrfpf
--

COPY public.table_name (id, id_user, id_studio) FROM stdin;
\.


--
-- Data for Name: tags; Type: TABLE DATA; Schema: public; Owner: ccklhgybucrfpf
--

COPY public.tags (id, tag) FROM stdin;
1	history
2	drama
3	batman
4	lotr
5	scifi
6	marvel
7	dc
8	comedy
9	chemistry
10	thriller
11	animated
12	mystery
13	time travel
\.


--
-- Data for Name: user_accounts; Type: TABLE DATA; Schema: public; Owner: ccklhgybucrfpf
--

COPY public.user_accounts (id, email, password, username, description, date_last_login, id_avatar, status) FROM stdin;
13	testuser2@test.com	$2y$10$lacYfToIyDNhP4xNLhGgVejpjzVHci86nnjsILa331KMJ9Oo.J3wG	test2	\N	\N	\N	standard_user
10	testuser@test.com	$2y$10$H38TIiWT4uEVqhobVrXCpOJmtcIbPXu82G8srhAMzfhQr4IDTgS0W	Test User edit	test user account used internally for new features! NOW WITH EDITS!!!	\N	51	standard_user
\.


--
-- Data for Name: user_watchlist; Type: TABLE DATA; Schema: public; Owner: ccklhgybucrfpf
--

COPY public.user_watchlist (id, id_user, id_production, mark, date_added, review, is_planned, date_modified, heart) FROM stdin;
2	10	1	8	2022-01-01	Cool stuff	f	2022-01-01	t
3	10	4	7	2022-01-01	\N	f	2022-01-01	t
5	10	11	\N	2022-01-01	\N	t	2022-01-01	f
4	10	14	4	2022-01-01	mediocre	f	2022-01-01	t
17	10	10	7	2022-01-21	neat!	f	2022-01-21	f
\.


--
-- Name: actors_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ccklhgybucrfpf
--

SELECT pg_catalog.setval('public.actors_id_seq', 2, true);


--
-- Name: attachments_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ccklhgybucrfpf
--

SELECT pg_catalog.setval('public.attachments_id_seq', 57, true);


--
-- Name: characters_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ccklhgybucrfpf
--

SELECT pg_catalog.setval('public.characters_id_seq', 2, true);


--
-- Name: directors_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ccklhgybucrfpf
--

SELECT pg_catalog.setval('public.directors_id_seq', 16, true);


--
-- Name: favorite_character_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ccklhgybucrfpf
--

SELECT pg_catalog.setval('public.favorite_character_id_seq', 1, false);


--
-- Name: favorite_director_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ccklhgybucrfpf
--

SELECT pg_catalog.setval('public.favorite_director_id_seq', 4, true);


--
-- Name: favorite_studio_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ccklhgybucrfpf
--

SELECT pg_catalog.setval('public.favorite_studio_id_seq', 1, false);


--
-- Name: follows_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ccklhgybucrfpf
--

SELECT pg_catalog.setval('public.follows_id_seq', 5, true);


--
-- Name: news_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ccklhgybucrfpf
--

SELECT pg_catalog.setval('public.news_id_seq', 8, true);


--
-- Name: production_character_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ccklhgybucrfpf
--

SELECT pg_catalog.setval('public.production_character_id_seq', 2, true);


--
-- Name: production_director_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ccklhgybucrfpf
--

SELECT pg_catalog.setval('public.production_director_id_seq', 20, true);


--
-- Name: production_studio_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ccklhgybucrfpf
--

SELECT pg_catalog.setval('public.production_studio_id_seq', 7, true);


--
-- Name: production_tag_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ccklhgybucrfpf
--

SELECT pg_catalog.setval('public.production_tag_id_seq', 17, true);


--
-- Name: productions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ccklhgybucrfpf
--

SELECT pg_catalog.setval('public.productions_id_seq', 21, true);


--
-- Name: studios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ccklhgybucrfpf
--

SELECT pg_catalog.setval('public.studios_id_seq', 5, true);


--
-- Name: table_name_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ccklhgybucrfpf
--

SELECT pg_catalog.setval('public.table_name_id_seq', 1, false);


--
-- Name: tags_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ccklhgybucrfpf
--

SELECT pg_catalog.setval('public.tags_id_seq', 13, true);


--
-- Name: user_accounts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ccklhgybucrfpf
--

SELECT pg_catalog.setval('public.user_accounts_id_seq', 13, true);


--
-- Name: user_watchlist_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ccklhgybucrfpf
--

SELECT pg_catalog.setval('public.user_watchlist_id_seq', 17, true);


--
-- Name: actors actors_pk; Type: CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.actors
    ADD CONSTRAINT actors_pk PRIMARY KEY (id);


--
-- Name: attachments attachments_pk; Type: CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.attachments
    ADD CONSTRAINT attachments_pk PRIMARY KEY (id);


--
-- Name: characters characters_pk; Type: CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.characters
    ADD CONSTRAINT characters_pk PRIMARY KEY (id);


--
-- Name: directors directors_pk; Type: CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.directors
    ADD CONSTRAINT directors_pk PRIMARY KEY (id);


--
-- Name: favorite_character favorite_character_pk; Type: CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.favorite_character
    ADD CONSTRAINT favorite_character_pk PRIMARY KEY (id);


--
-- Name: favorite_director favorite_director_pk; Type: CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.favorite_director
    ADD CONSTRAINT favorite_director_pk PRIMARY KEY (id);


--
-- Name: favorite_studio favorite_studio_pk; Type: CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.favorite_studio
    ADD CONSTRAINT favorite_studio_pk PRIMARY KEY (id);


--
-- Name: follows follows_pk; Type: CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.follows
    ADD CONSTRAINT follows_pk PRIMARY KEY (id);


--
-- Name: news news_pk; Type: CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.news
    ADD CONSTRAINT news_pk PRIMARY KEY (id);


--
-- Name: production_character production_character_pk; Type: CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.production_character
    ADD CONSTRAINT production_character_pk PRIMARY KEY (id);


--
-- Name: production_director production_director_pk; Type: CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.production_director
    ADD CONSTRAINT production_director_pk PRIMARY KEY (id);


--
-- Name: production_studio production_studio_pk; Type: CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.production_studio
    ADD CONSTRAINT production_studio_pk PRIMARY KEY (id);


--
-- Name: production_tag production_tag_pk; Type: CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.production_tag
    ADD CONSTRAINT production_tag_pk PRIMARY KEY (id);


--
-- Name: productions productions_pk; Type: CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.productions
    ADD CONSTRAINT productions_pk PRIMARY KEY (id);


--
-- Name: studios studios_pk; Type: CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.studios
    ADD CONSTRAINT studios_pk PRIMARY KEY (id);


--
-- Name: table_name table_name_pk; Type: CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.table_name
    ADD CONSTRAINT table_name_pk PRIMARY KEY (id);


--
-- Name: tags tags_pk; Type: CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.tags
    ADD CONSTRAINT tags_pk PRIMARY KEY (id);


--
-- Name: user_accounts user_accounts_pk; Type: CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.user_accounts
    ADD CONSTRAINT user_accounts_pk PRIMARY KEY (id);


--
-- Name: user_watchlist user_watchlist_pk; Type: CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.user_watchlist
    ADD CONSTRAINT user_watchlist_pk PRIMARY KEY (id);


--
-- Name: attachments_image_src_uindex; Type: INDEX; Schema: public; Owner: ccklhgybucrfpf
--

CREATE UNIQUE INDEX attachments_image_src_uindex ON public.attachments USING btree (image_src);


--
-- Name: user_accounts_email_uindex; Type: INDEX; Schema: public; Owner: ccklhgybucrfpf
--

CREATE UNIQUE INDEX user_accounts_email_uindex ON public.user_accounts USING btree (email);


--
-- Name: user_accounts_username_uindex; Type: INDEX; Schema: public; Owner: ccklhgybucrfpf
--

CREATE UNIQUE INDEX user_accounts_username_uindex ON public.user_accounts USING btree (username);


--
-- Name: user_watchlist_id_user_id_production_uindex; Type: INDEX; Schema: public; Owner: ccklhgybucrfpf
--

CREATE UNIQUE INDEX user_watchlist_id_user_id_production_uindex ON public.user_watchlist USING btree (id_user, id_production);


--
-- Name: actors actors_attachments_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.actors
    ADD CONSTRAINT actors_attachments_id_fk FOREIGN KEY (id_picture) REFERENCES public.attachments(id) ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: characters characters_actors_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.characters
    ADD CONSTRAINT characters_actors_id_fk FOREIGN KEY (id_actor) REFERENCES public.actors(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: characters characters_attachments_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.characters
    ADD CONSTRAINT characters_attachments_id_fk FOREIGN KEY (id_picture) REFERENCES public.attachments(id) ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: directors directors_attachments_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.directors
    ADD CONSTRAINT directors_attachments_id_fk FOREIGN KEY (id_picture) REFERENCES public.attachments(id) ON UPDATE CASCADE ON DELETE SET DEFAULT;


--
-- Name: favorite_character favorite_character_characters_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.favorite_character
    ADD CONSTRAINT favorite_character_characters_id_fk FOREIGN KEY (id_character) REFERENCES public.characters(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: favorite_character favorite_character_user_accounts_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.favorite_character
    ADD CONSTRAINT favorite_character_user_accounts_id_fk FOREIGN KEY (id_user) REFERENCES public.user_accounts(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: favorite_director favorite_director_directors_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.favorite_director
    ADD CONSTRAINT favorite_director_directors_id_fk FOREIGN KEY (id_director) REFERENCES public.directors(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: favorite_director favorite_director_user_accounts_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.favorite_director
    ADD CONSTRAINT favorite_director_user_accounts_id_fk FOREIGN KEY (id_user) REFERENCES public.user_accounts(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: favorite_studio favorite_studio_studios_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.favorite_studio
    ADD CONSTRAINT favorite_studio_studios_id_fk FOREIGN KEY (id_studio) REFERENCES public.studios(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: favorite_studio favorite_studio_user_accounts_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.favorite_studio
    ADD CONSTRAINT favorite_studio_user_accounts_id_fk FOREIGN KEY (id_user) REFERENCES public.user_accounts(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: follows follows_user_accounts_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.follows
    ADD CONSTRAINT follows_user_accounts_id_fk FOREIGN KEY (id_followed_user) REFERENCES public.user_accounts(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: follows follows_user_accounts_id_fk_2; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.follows
    ADD CONSTRAINT follows_user_accounts_id_fk_2 FOREIGN KEY (id_following_user) REFERENCES public.user_accounts(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: news news_attachments_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.news
    ADD CONSTRAINT news_attachments_id_fk FOREIGN KEY (id_picture) REFERENCES public.attachments(id) ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: production_character production_character_characters_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.production_character
    ADD CONSTRAINT production_character_characters_id_fk FOREIGN KEY (id_character) REFERENCES public.characters(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: production_character production_character_productions_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.production_character
    ADD CONSTRAINT production_character_productions_id_fk FOREIGN KEY (id_production) REFERENCES public.productions(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: production_director production_director_directors_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.production_director
    ADD CONSTRAINT production_director_directors_id_fk FOREIGN KEY (id_director) REFERENCES public.directors(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: production_director production_director_productions_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.production_director
    ADD CONSTRAINT production_director_productions_id_fk FOREIGN KEY (id_production) REFERENCES public.productions(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: production_studio production_studio_productions_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.production_studio
    ADD CONSTRAINT production_studio_productions_id_fk FOREIGN KEY (id_production) REFERENCES public.productions(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: production_studio production_studio_studios_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.production_studio
    ADD CONSTRAINT production_studio_studios_id_fk FOREIGN KEY (id_studio) REFERENCES public.studios(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: production_tag production_tag_productions_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.production_tag
    ADD CONSTRAINT production_tag_productions_id_fk FOREIGN KEY (id_production) REFERENCES public.productions(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: production_tag production_tag_tags_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.production_tag
    ADD CONSTRAINT production_tag_tags_id_fk FOREIGN KEY (id_tag) REFERENCES public.tags(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: productions productions_attachments_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.productions
    ADD CONSTRAINT productions_attachments_id_fk FOREIGN KEY (id_poster) REFERENCES public.attachments(id) ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: studios studios_attachments_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.studios
    ADD CONSTRAINT studios_attachments_id_fk FOREIGN KEY (id_picture) REFERENCES public.attachments(id) ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: table_name table_name_studios_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.table_name
    ADD CONSTRAINT table_name_studios_id_fk FOREIGN KEY (id_studio) REFERENCES public.studios(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: table_name table_name_user_accounts_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.table_name
    ADD CONSTRAINT table_name_user_accounts_id_fk FOREIGN KEY (id_user) REFERENCES public.user_accounts(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: user_accounts user_accounts_attachments_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.user_accounts
    ADD CONSTRAINT user_accounts_attachments_id_fk FOREIGN KEY (id_avatar) REFERENCES public.attachments(id) ON UPDATE CASCADE ON DELETE SET NULL;


--
-- Name: user_watchlist user_watchlist_productions_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.user_watchlist
    ADD CONSTRAINT user_watchlist_productions_id_fk FOREIGN KEY (id_production) REFERENCES public.productions(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: user_watchlist user_watchlist_user_accounts_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: ccklhgybucrfpf
--

ALTER TABLE ONLY public.user_watchlist
    ADD CONSTRAINT user_watchlist_user_accounts_id_fk FOREIGN KEY (id_user) REFERENCES public.user_accounts(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: ccklhgybucrfpf
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO ccklhgybucrfpf;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: LANGUAGE plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO ccklhgybucrfpf;


--
-- PostgreSQL database dump complete
--

